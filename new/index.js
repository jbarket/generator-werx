'use strict';
var yeoman = require('yeoman-generator');
var inflector = require('inflected');

module.exports = yeoman.generators.Base.extend({
    config: function () {
        this.composeWith('werx:config');
    },

    writing: function () {
        this.log('Generating new werx skeleton');

        // root files
        this.fs.copyTpl(
            this.templatePath('gitignore'),
            this.destinationPath('.gitignore')
        );

        this.fs.copyTpl(
            this.templatePath('LICENSE'),
            this.destinationPath('LICENSE')
        );

        this.fs.copyTpl(
            this.templatePath('PSR2Tabs.xml'),
            this.destinationPath('PSR2Tabs.xml')
        );

        this.fs.copyTpl(
            this.templatePath('README.md'),
            this.destinationPath('README.md')
        );

        this.fs.copyTpl(
            this.templatePath('codesniffer'),
            this.destinationPath('codesniffer')
        );

        this.fs.copyTpl(
            this.templatePath('composer.json'),
            this.destinationPath('composer.json'),
            { root_namespace: this.config.get('root_namespace')}
        );

        this.fs.copyTpl(
            this.templatePath('index.html'),
            this.destinationPath('index.html')
        );

        this.fs.copyTpl(
            this.templatePath('phpunit.xml'),
            this.destinationPath('phpunit.xml')
        );

        this.fs.copyTpl(
            this.templatePath('phpunit.php'),
            this.destinationPath('phpunit.php')
        );

        // web dir
        this.fs.copyTpl(
            this.templatePath('web/.htaccess'),
            this.destinationPath('web/.htaccess')
        );

        this.fs.copyTpl(
            this.templatePath('web/index.php'),
            this.destinationPath('web/index.php'),
            { root_namespace: this.config.get('root_namespace')}
        );

        this.fs.copyTpl(
            this.templatePath('web/assets/css/site.css'),
            this.destinationPath('web/assets/css/site.css')
        );

        this.fs.copyTpl(
            this.templatePath('web/assets/less/site.less'),
            this.destinationPath('web/assets/less/site.less')
        );

        // src/controllers
        this.fs.copyTpl(
            this.templatePath('web/src/controllers/Base.php'),
            this.destinationPath('web/src/controllers/Base.php'),
            { root_namespace: this.config.get('root_namespace')}
        );

        this.fs.copyTpl(
            this.templatePath('web/src/controllers/Home.php'),
            this.destinationPath('web/src/controllers/Home.php'),
            { root_namespace: this.config.get('root_namespace')}
        );

        // src/entities
        this.fs.copyTpl(
            this.templatePath('web/src/entities/README.md'),
            this.destinationPath('web/src/entities/README.md')
        );

        // src/managers
        this.fs.copyTpl(
            this.templatePath('web/src/managers/README.md'),
            this.destinationPath('web/src/managers/README.md')
        );

        // src/models
        this.fs.copyTpl(
            this.templatePath('web/src/models/README.md'),
            this.destinationPath('web/src/models/README.md')
        );

        // src/storage
        this.fs.copyTpl(
            this.templatePath('web/src/storage/README.md'),
            this.destinationPath('web/src/storage/README.md')
        );

        // src/utils
        this.fs.copyTpl(
            this.templatePath('web/src/utils/README.md'),
            this.destinationPath('web/src/utils/README.md')
        );

        // src/validators
        this.fs.copyTpl(
            this.templatePath('web/src/validators/README.md'),
            this.destinationPath('web/src/validators/README.md')
        );

        // src/views
        this.fs.copyTpl(
            this.templatePath('web/src/views/common/error.php'),
            this.destinationPath('web/src/views/common/error.php')
        );

        this.fs.copyTpl(
            this.templatePath('web/src/views/home/index.php'),
            this.destinationPath('web/src/views/home/index.php')
        );

        this.fs.copyTpl(
            this.templatePath('web/src/views/layouts/default.php'),
            this.destinationPath('web/src/views/layouts/default.php')
        );

        // src/config
        this.fs.copyTpl(
            this.templatePath('web/src/config/config.php'),
            this.destinationPath('web/src/config/config.php')
        );

        this.fs.copyTpl(
            this.templatePath('web/src/config/local/config.php'),
            this.destinationPath('web/src/config/local/config.php')
        );

        this.fs.copyTpl(
            this.templatePath('web/src/config/prod/config.php'),
            this.destinationPath('web/src/config/prod/config.php')
        );

        this.fs.copyTpl(
            this.templatePath('web/src/config/test/config.php'),
            this.destinationPath('web/src/config/test/config.php')
        );

        this.fs.copyTpl(
            this.templatePath('web/src/config/database.php'),
            this.destinationPath('web/src/config/database.php')
        );

        this.fs.copyTpl(
            this.templatePath('web/src/config/environment'),
            this.destinationPath('web/src/config/environment')
        );

        this.fs.copyTpl(
            this.templatePath('web/src/config/routes.php'),
            this.destinationPath('web/src/config/routes.php')
        );


    }
});
