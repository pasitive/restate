set :application, "vebel.ru"
set :deploy_to, "/srv/www/#{application}"

default_run_options[:pty] = true
set :scm, :git
set :repository, "git://github.com/pasitive/zapad.git"
set :deploy_via, :remote_cache
set :git_enable_submodules, 1
                         
set :domain, "deployer@vebel.ru"
set :user, "deployer"
set :group, "users"
set :port, 2112
set :use_sudo, false

ssh_options[:forward_agent] = true

role :web, '176.9.18.107'
role :app, '176.9.18.107'
role :db, '176.9.18.107', :primary => true

set :branch do
  default_tag = `git describe --abbrev=0 --tags`.split("\n").last
  tag = Capistrano::CLI.ui.ask "Tag to deploy (make sure to push the tag first): [#{default_tag}] "
  tag = default_tag if tag.empty?
  tag
end unless exists?(:branch)      

namespace :app do
  task :setup do
    run "rm -rf #{shared_path}/runtime"
    run "rm -rf #{shared_path}/assets"
    run "rm -rf #{shared_path}/upload"
    run "rm -rf #{shared_path}/config"
    
    run "mkdir #{shared_path}/runtime"
    run "mkdir #{shared_path}/assets"
    run "mkdir #{shared_path}/upload"
    run "mkdir #{shared_path}/config"
    
    run "chmod 0777 #{shared_path}/runtime"
    run "chmod 0777 #{shared_path}/assets"
    run "chmod 0777 #{shared_path}/upload"  
    
    run "cp -R #{current_release}/protected/config #{shared_path}/"
  end
end

namespace :deploy do
  task :restart do
    puts "Nothing to restart"
  end
  task :finalize_update, :except => { :no_release => true } do 
    run "ln -s #{shared_path}/runtime #{latest_release}/protected/runtime"
    run "ln -s #{shared_path}/assets #{latest_release}/public/assets"
    run "ln -s #{shared_path}/upload #{latest_release}/public/upload"
    run "ln -s #{shared_path}/components/DbConnection.php #{latest_release}/protected/components/DbConnection.php"
    
    run "#{latest_release}/protected/yiic migrate up --interactive=0"
  end
end
