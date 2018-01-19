require 'mina/rsync'

set :user, ENV['USER'] || 'username'
set :domain, ENV['DOMAIN'] || 'foobar.com'
set :deploy_to, ENV['DEPLOY_PATH'] || '/var/www/foobar.com'
set :branch, ENV['GIT_BRANCH'] || 'master'
set :repository, ENV['GIT_REPO'] || '.'
set :rsync_stage, ENV['RSYNC_STAGE'] || '.'
set :forward_agent, true
set :rsync_options, %w[
  --recursive --delete --delete-excluded
  --exclude .git*
  --exclude config/deploy.rb
  --exclude bower_components/*
  --exclude node_modules/*
]
set :shared_paths, [
    '.env',
    'bootstrap/cache',
    'storage/framework',
    'storage/logs',
    'storage/app'
]

desc 'Deploy to server'
task :deploy do
  deploy do
    invoke 'rsync:deploy'
    invoke :'deploy:link_shared_paths'
    invoke :'deploy:cleanup'
  end
end

task :setup => :environment do
  queue %[mkdir -p "#{deploy_to}/shared/bootstrap/cache"]
  queue %[mkdir -p "#{deploy_to}/shared/storage/logs"]
  queue %[mkdir -p "#{deploy_to}/shared/storage/app"]
  queue %[mkdir -p "#{deploy_to}/shared/storage/framework"]
  queue %[mkdir -p "#{deploy_to}/shared/storage/framework/cache"]
  queue %[mkdir -p "#{deploy_to}/shared/storage/framework/views"]
  queue %[chmod -R 777 "#{deploy_to}/shared/storage"]
  queue %[chmod -R 777 "#{deploy_to}/shared/bootstrap/cache"]
end

task :precompile do
  Dir.chdir settings.rsync_stage do
    print_str '-----> Composer Install'
    system '/usr/local/bin/composer install --optimize-autoloader --no-dev --ignore-platform-reqs --no-scripts' or exit!(1)
    print_str '-----> YARN Install'
    system ('/usr/bin/yarn install') or exit!(1)
    print_str '-----> Bower Install'
    system ('./node_modules/bower/bin/bower install --verbose') or exit!(1)
    print_str '-----> Gulp Build'
    system ('./node_modules/gulp/bin/gulp.js') or exit!(1)
  end
end

task 'rsync:stage' do
  invoke 'precompile'
end