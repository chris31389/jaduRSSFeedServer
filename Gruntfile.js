module.exports = function(grunt) {

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    clean: {
      all: {
        src: ["client/**"]
      },
      js: {
        src: ["client/js/**"]
      },
      css: {
        src: ["client/css/**"]
      },
      html: {
        src: ["client/index.html"]
      }
    },
    jshint: {
      options: {
        globals: {
          angular: true
        }
      },
      scripts: {
        src: ['dev/js/scripts/*.js']
      }
    },
    concat: {
      js: {
        options: {
          banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n'
        },
        src: [
          'dev/js/scripts/app.js',
          'dev/js/scripts/ctrlr.js',
          'dev/js/scripts/srv.js'
        ],
        dest: 'client/js/main.js'
      },
      css: {
        options: {
          banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n'
        },
        src: ['dev/css/*.css'],
        dest: 'client/css/main.css'
      },
      html: {
        src: [
          'dev/html/header.html',
          'dev/html/nav.html',
          'dev/html/viewer.html',
          'dev/html/footer.html'
        ],
        dest: 'client/index.html'
      }
    },
    uglify: {
      options: {
        banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n'
      },
      build: {
        src: 'client/js/main.js',
        dest: 'client/js/main.min.js'
      },
      build_libs: {
        files: [{
          expand: true,
          cwd: 'dev/js/libs/',
          src: [
            '**.js',
            '!**.min.js'
          ],
          dest: 'client/js/libs/',
          ext: '.min.js'
        }]
      }
    },
    copy: {
      min: {
        expand: true,
        cwd: 'dev/js/libs/',
        src: '**.min.js',
        dest: 'client/js/libs/' 
      },
      bootstrap: {
        expand: true,
        cwd: 'dev/bootstrap/',
        src: '**',
        dest: 'client/bootstrap/' 
      },
      normal: {
        expand: true,
        cwd: 'dev/js/libs/',
        src: [
          '**.js',
          '!**.min.js'
        ],
        dest: 'client/js/libs/' 
      },
      img: {
        expand: true,
        cwd: 'dev/img/',
        src: '**',
        dest: 'client/img/' 
      },
      partials: {
        expand: true,
        cwd: 'dev/html/partials/',
        src: '**',
        dest: 'client/partials/' 
      }
    },
    watch: {
      all: {
        files: ['dev/**'],
        tasks: ['jshint','clean:all','concat','uglify','copy']
      },
      js: {
        files: ['dev/js/**/*.js'],
        tasks: ['jshint','clean:js','concat:js','uglify','copy']
      },
      css: {
        files: ['dev/css/**/*.css'],
        tasks: ['clean:css','concat:css']
      },
      html: {
        files: ['dev/html/**/*.html'],
        tasks: ['clean:html','concat:html']
      } 
    }
  });

  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');

  grunt.registerTask('default', ['jshint','clean','concat','uglify','copy']);

};