module.exports = function(grunt)
{
	grunt.initConfig({

		// Unificar y minificar scripts
		uglify: {

			// Scripst generales
			mi_prueba: {
				files: {
					'js/scripts.min.js': [
						// 'js/jquery.js',
						'js/placeholder.js',
						'js/owl.carousel.js',
						// 'js/jquery.placeholder.js',
						'js/jquery.swipebox.js',
						'js/scripts.js'
					]
				}
			}

			// Scripts del multidatepicker
			mi_multidatepicker: {
				files: {
					'js/multidatepicker.min.js': [
						'js/jquery-1.11.1.js',
						'js/jquery-ui-1.11.1.js',
						'js/jquery-ui.multidatespicker.js'
					]
				}
			}
		},

		// Monitorear cambios
		watch: {
			// Los Scripts
			scripts: {
				files: ['js/*.js'],
				tasks: ['uglify'],
				options: {
					spawn: false
				}
			}
		}
	});


	// grunt.loadNpmTasks('grunt-postcss');
	// grunt.registerTask('css', ['stylus', 'postcss']);
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-watch');
	// grunt.loadNpmTasks("grunt-browser-sync");
	// grunt.loadNpmTasks('grunt-contrib-imagemin');
};

