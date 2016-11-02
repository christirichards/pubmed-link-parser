module.exports = function(grunt) {

  grunt.initConfig({

    pkg: grunt.file.readJSON('package.json'),
    concat: {
        css: {
            src: ['src/css/style.css'],
            dest: 'dist/css/main.css'
        },
        js: {
            src: ['bower_components/jquery/dist/jquery.js', 'bower_components/bootstrap/dist/js/bootstrap.js', 'bower_components/clipboard/dist/clipboard.js', 'src/js/main.js'],
            dest: 'dist/js/main.js'
      }
    },
    uglify: {
        js: {
            src: 'dist/js/main.js',
            dest: 'dist/js/main.min.js'
        }
    },
    cssmin: {
        css:{
            src: 'dist/css/main.css',
            dest: 'dist/css/main.min.css'
        }
    },
    sync: {
        main: {
            files: [{
                cwd: 'src/img/',
                src: [
                  '**',
                ],
                dest: 'dist/img/',
            }],
        pretend: false,
        verbose: true
      }
  }
});

  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-sync');
  grunt.registerTask('default', ['concat', 'uglify', 'cssmin', 'sync']);

};
