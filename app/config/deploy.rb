set :application, "deviab"
set :domain,      "54.255.153.190"
set :deploy_to,   "/var/www/lytyfy.org"
set :app_path,    "app"

set :repository,  "git@gitlab.com:rnd/deviab.git"
set :scm,         :git
# Or: `accurev`, `bzr`, `cvs`, `darcs`, `subversion`, `mercurial`, `perforce`, or `none`

set :model_manager, "doctrine"
# Or: `propel`

role :web,        domain                         # Your HTTP server, Apache/etc
role :app,        domain, :primary => true       # This may be the same as your `Web` server

set  :keep_releases,  3
set  :dump_assetic_assets, true
set  :use_composer, true
set  :shared_files,      ["app/config/parameters.yml"]
set  :shared_children,     [app_path + "/logs", web_path + "/uploads", "vendor", app_path + "/sessions"]
set  :use_sudo,      true
set  :user, "ubuntu"


set :writable_dirs,       ["app/cache", "app/logs", "app/sessions"]
set :webserver_user,      "www-data"
set :permission_method,   :acl
set :use_set_permissions, true

ssh_options[:forward_agent] = true
ssh_options[:verbose] = :debug
default_run_options[:pty] = true


# Be more verbose by uncommenting the following line
logger.level = Logger::MAX_LEVEL