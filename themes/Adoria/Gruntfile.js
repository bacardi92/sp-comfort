module.exports = function(grunt) {
  
    grunt.initConfig({

        pkg: grunt.file.readJSON('package.json'),

        less: {
          development: {
            options: {
                compress: false,
                yuicompress: false,
                optimization: 2
            },
            files: {
              "css/style.min.css": "components/less/main.less" 
            }
          }
        },

        concat: {
            dist: {
                src:  'components/**/*.js', 
                dest: 'js/theme_script.js'                   
            }
        },

        browserSync: {
            dev: {
                bsFiles: {
                    src:['css/*.css', 'js/*.js', 'wp-content/themes/bacardi/*.php']
                },
                options: {
                    proxy: "composer.loc"
                }
            }
        },

        watch: {
            styles: {
                files: ['components/less/**/*.less'], // which files to watch
                tasks: ['less'],
                options: {
                  nospawn: true
                }
            },
            scripts:{ 
                files: ['components/js/**/*.js'],
                tasks: ['concat']            
            }
        }

    });


    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-concat'); 
    grunt.loadNpmTasks('grunt-browser-sync');
    grunt.loadNpmTasks('grunt-contrib-watch'); 
    grunt.registerTask('default', ['less', 'concat', 'browserSync', 'watch']);


};