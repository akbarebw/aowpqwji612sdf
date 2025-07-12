<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Application Name
	|--------------------------------------------------------------------------
	|
	| This value is the name of your application. This value is used when the
	| framework needs to place the application's name in a notification or
	| any other location as required by the application or its packages.
	|
	*/

	'name' => env('APP_NAME', 'Edumin Laravel'),

	'public' => [
        'asset_dashboard' => [
                'global' => [
                    'css' => [
                            'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
                    ],
                    'js' => [
                        'top'=> [
                            'vendor/global/global.min.js',
                            'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
                            'vendor/svganimation/vivus.min.js',
                            'vendor/svganimation/svg.animation.js',

                        ],
                        'bottom'=> [
                            'js/custom.min.js',
                            'js/dlabnav-init.js',
                        ],
                    ],
                ],
            ],
		'pagelevel' => [
			'css' => [
				'EduminAdminController_dashboard' => [
					'vendor/chartist/css/chartist.min.css',
					'vendor/owl-carousel/owl.carousel.css',

				],
				'EduminAdminController_dashboard_2' => [
					'vendor/chartist/css/chartist.min.css',
					'vendor/owl-carousel/owl.carousel.css',
				],
				'EduminAdminController_dashboard_3' => [
					'vendor/chartist/css/chartist.min.css',
				],
				'EduminAdminController_event_management' => [
					'vendor/fullcalendar/css/fullcalendar.min.css',
				],
				'EduminAdminController_all_professors' => [
					'vendor/pickadate/themes/default.css',
					'vendor/pickadate/themes/default.date.css',
					'vendor/datatables/css/jquery.dataTables.min.css',

				],
				'EduminAdminController_all_students' => [
					'vendor/datatables/css/jquery.dataTables.min.css',

				],
				'EduminAdminController_all_library' => [
					'vendor/datatables/css/jquery.dataTables.min.css',

				],
				'EduminAdminController_all_departments' => [
					'vendor/datatables/css/jquery.dataTables.min.css',

				],
				'EduminAdminController_all_staff' => [
					'vendor/datatables/css/jquery.dataTables.min.css',

				],
				'EduminAdminController_all_holiday' => [
					'vendor/datatables/css/jquery.dataTables.min.css',

				],
				'EduminAdminController_add_professor' => [
					'vendor/pickadate/themes/default.css',
					'vendor/pickadate/themes/default.date.css',
					'vendor/datatables/css/jquery.dataTables.min.css',

				],
				'EduminAdminController_add_fees' => [
					'vendor/pickadate/themes/default.css',
					'vendor/pickadate/themes/default.date.css',

				],
				'EduminAdminController_add_holiday' => [
					'vendor/pickadate/themes/default.css',
					'vendor/pickadate/themes/default.date.css',

				],

				'EduminAdminController_add_staff' => [
					'vendor/pickadate/themes/default.css',
					'vendor/pickadate/themes/default.date.css',

				],
				'EduminAdminController_add_departments' => [
					'vendor/pickadate/themes/default.css',
					'vendor/pickadate/themes/default.date.css',

				],
				'EduminAdminController_add_courses' => [
					'vendor/pickadate/themes/default.css',
					'vendor/pickadate/themes/default.date.css',

				],
				'EduminAdminController_add_library' => [
					'vendor/pickadate/themes/default.css',
					'vendor/pickadate/themes/default.date.css',

				],
				'EduminAdminController_add_student' => [
					'vendor/pickadate/themes/default.css',
					'vendor/pickadate/themes/default.date.css',

				],
				'EduminAdminController_edit_professor' => [
					'vendor/pickadate/themes/default.css',
					'vendor/pickadate/themes/default.date.css',

				],
				'EduminAdminController_edit_holiday' => [
					'vendor/pickadate/themes/default.css',
					'vendor/pickadate/themes/default.date.css',

				],
				'EduminAdminController_edit_departments' => [
					'vendor/pickadate/themes/default.css',
					'vendor/pickadate/themes/default.date.css',
				],
				'EduminAdminController_edit_library' => [
					'vendor/pickadate/themes/default.css',
					'vendor/pickadate/themes/default.date.css',

				],
				'EduminAdminController_fees_collection' => [
					'vendor/datatables/css/jquery.dataTables.min.css',
				],

				'EduminAdminController_edit_staff' => [
					'vendor/pickadate/themes/default.css',
					'vendor/pickadate/themes/default.date.css',
				],
				'EduminAdminController_edit_courses' => [
					'vendor/pickadate/themes/default.css',
					'vendor/pickadate/themes/default.date.css',

				],
				'EduminAdminController_edit_student' => [
					'vendor/pickadate/themes/default.css',
					'vendor/pickadate/themes/default.date.css',

				],
				'EduminAdminController_app_calender' => [
					'vendor/fullcalendar/css/fullcalendar.min.css'
				],
				'EduminAdminController_celandar' => [
					'vendor/fullcalendar-5.11.0/lib/main.css',
					'vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css'
				],
				'EduminAdminController_job_list'=>[
					'vendor/datatables/css/jquery.dataTables.min.css'
				],
				'EduminAdminController_job_application'=>[
					'vendor/datatables/css/jquery.dataTables.min.css',
				],
				'EduminAdminController_student_detail'=>[
					'vendor/datatables/css/jquery.dataTables.min.css',
					'vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css',
				],
				'EduminAdminController_add_blog'=>[
					'vendor/select2/css/select2.min.css',
					'vendor/bootstrap-datepicker-master/css/bootstrap-datepicker.min.css',
					'vendor/tagify/dist/tagify.css',
				],
				'EduminAdminController_edit_profile' => [
					'vendor/bootstrap-datepicker-master/css/bootstrap-datepicker.min.css',

				],
				'EduminAdminController_app_profile' => [
					'vendor/lightgallery/dist/css/lightgallery.css',
					'vendor/lightgallery/dist/css/lg-thumbnail.css',
					'vendor/lightgallery/dist/css/lg-zoom.css',

				],

				'EduminAdminController_post_details' => [
					'vendor/lightgallery/dist/css/lightgallery.css',
					'vendor/lightgallery/dist/css/lg-thumbnail.css',
					'vendor/lightgallery/dist/css/lg-zoom.css',

				],
				'EduminAdminController_menu' => [
					'vendor/nestable2/css/jquery.nestable.min.css',

				],
				'EduminAdminController_add_teacher' => [
					'vendor/bootstrap-datepicker-master/css/bootstrap-datepicker.min.css',

				],
				'EduminAdminController_blog_category' => [
					'vendor/datatables/css/jquery.dataTables.min.css',

				],
				'EduminAdminController_content_add' => [
					'vendor/bootstrap-datepicker-master/css/bootstrap-datepicker.min.css',
					'vendor/select2/css/select2.min.css',

				],

				'EduminAdminController_chart_chartist' => [
					'vendor/chartist/css/chartist.min.css'
				],
				'EduminAdminController_chart_chartjs' => [
				],
				'EduminAdminController_chart_flot' => [
				],
				'EduminAdminController_chart_morris' => [
				],
				'EduminAdminController_chart_peity' => [
				],
				'EduminAdminController_chart_sparkline' => [
				],
				'EduminAdminController_ecom_checkout' => [
				],
				'EduminAdminController_ecom_customers' => [
				],
				'EduminAdminController_ecom_invoice' => [

				],
				'EduminAdminController_ecom_product_detail' => [
					'vendor/star-rating/star-rating-svg.css',
					'vendor/owl-carousel/owl.carousel.css',
				],
				'EduminAdminController_ecom_product_grid' => [
				],
				'EduminAdminController_ecom_product_list' => [
					'vendor/star-rating/star-rating-svg.css'
				],
				'EduminAdminController_ecom_product_order' => [
				],
				'EduminAdminController_email_compose' => [
					'vendor/dropzone/dist/dropzone.css'
				],
				'EduminAdminController_email_inbox' => [

				],
				'EduminAdminController_email_read' => [
				],
				'EduminAdminController_editor' => [

				],
				'EduminAdminController_form_element' => [
				],
				'EduminAdminController_form_pickers' => [
					'vendor/bootstrap-daterangepicker/daterangepicker.css',
					'vendor/clockpicker/css/bootstrap-clockpicker.min.css',
					'vendor/jquery-asColorPicker/css/asColorPicker.min.css',
					'vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css',
					'vendor/pickadate/themes/default.css',
					'vendor/pickadate/themes/default.date.css',
					'https://fonts.googleapis.com/icon?family=Material+Icons',
				],
				'EduminAdminController_email_template' => [
					'vendor/bootstrap-datepicker-master/css/bootstrap-datepicker.min.css',
					'vendor/datatables/css/jquery.dataTables.min.css',
				],
				'EduminAdminController_content' => [
					'vendor/bootstrap-datepicker-master/css/bootstrap-datepicker.min.css',
				],
				'EduminAdminController_blog' => [
					'vendor/bootstrap-datepicker-master/css/bootstrap-datepicker.min.css',
					'vendor/datatables/css/jquery.dataTables.min.css',
				],
				'EduminAdminController_holiday_calendar' => [

					'vendor/fullcalendar/css/fullcalendar.min.css',
				],
				'EduminAdminController_form_validation_jquery' => [
				],
				'EduminAdminController_form_wizard' => [
					'vendor/jquery-smartwizard/dist/css/smart_wizard.min.css',
				],
				'EduminAdminController_map_jqvmap' => [
					'vendor/jqvmap/css/jqvmap.min.css'
				],
				'EduminAdminController_page_error_400' => [
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css'
				],
				'EduminAdminController_table_bootstrap_basic' => [

				],
				'EduminAdminController_table_datatable_basic' => [
					'vendor/datatables/css/jquery.dataTables.min.css',
					'vendor/datatables/css/responsive.bootstrap.min.css',


				],
				'EduminAdminController_uc_lightgallery' => [
					'vendor/lightgallery/dist/css/lightgallery.css',
					'vendor/lightgallery/dist/css/lg-thumbnail.css',
					'vendor/lightgallery/dist/css/lg-zoom.css',

				],
				'EduminAdminController_uc_nestable' => [
					'vendor/nestable2/css/jquery.nestable.min.css'
				],
				'EduminAdminController_uc_noui_slider' => [
					'vendor/nouislider/nouislider.min.css'
				],
				'EduminAdminController_uc_select2' => [
					'vendor/select2/css/select2.min.css'
				],
				'EduminAdminController_uc_sweetalert' => [
					'vendor/sweetalert2/dist/sweetalert2.min.css'
				],
				'EduminAdminController_uc_toastr' => [
					'vendor/toastr/css/toastr.min.css'
				],

				'EduminAdminController_ui_accordion' => [
				],
				'EduminAdminController_ui_alert' => [
				],
				'EduminAdminController_ui_badge' => [
				],
				'EduminAdminController_ui_button' => [
				],
				'EduminAdminController_ui_button_group' => [
				],
				'EduminAdminController_ui_card' => [
				],
				'EduminAdminController_ui_carousel' => [
				],
				'EduminAdminController_ui_dropdown' => [
				],
				'EduminAdminController_ui_grid' => [
				],
				'EduminAdminController_ui_list_group' => [
				],
				'EduminAdminController_ui_media_object' => [
				],
				'EduminAdminController_ui_modal' => [
				],
				'EduminAdminController_ui_pagination' => [
				],
				'EduminAdminController_ui_popover' => [
				],
				'EduminAdminController_ui_progressbar' => [
				],
				'EduminAdminController_ui_tab' => [
				],
				'EduminAdminController_ui_typography' => [
				],
				'EduminAdminController_widget_basic' => [
					'vendor/chartist/css/chartist.min.css',
				],
			],
			'js' => [
				'EduminAdminController_dashboard' => [
					'vendor/ckeditor/ckeditor.js',
					'vendor/jquery-sparkline/jquery.sparkline.min.js',
					'js/plugins-init/sparkline-init.js',
					'vendor/raphael/raphael.min.js',
					'vendor/morris/morris.min.js',
					'js/plugins-init/widgets-script-init.js',
					'js/dashboard/dashboard.js',
				],
				'EduminAdminController_dashboard_2' => [
					'vendor/raphael/raphael.min.js',
					'vendor/morris/morris.min.js',
					'vendor/peity/jquery.peity.min.js',
					'js/dashboard/dashboard-2.js',
				],

				'EduminAdminController_dashboard_3' => [
					'vendor/chart.js/Chart.bundle.min.js',
					'vendor/peity/jquery.peity.min.js',
					'vendor/jquery-sparkline/jquery.sparkline.min.js',
					'js/dashboard/dashboard-3.js',
				],


				'EduminAdminController_event_management' => [
					'vendor/jqueryui/js/jquery-ui.min.js',
					'vendor/moment/moment.min.js',
					'vendor/fullcalendar/js/fullcalendar.min.js',
					'js/plugins-init/fullcalendar-init.js',
				],
				'EduminAdminController_fees_collection' => [
					'vendor/datatables/js/jquery.dataTables.min.js',
					'js/plugins-init/datatables.init.js',
				],

				'EduminAdminController_all_professors' => [
					'vendor/datatables/js/jquery.dataTables.min.js',
					'js/plugins-init/datatables.init.js',
				],
				'EduminAdminController_all_students' => [
					'vendor/datatables/js/jquery.dataTables.min.js',
					'js/plugins-init/datatables.init.js',
				],
				'EduminAdminController_all_library' => [
					'vendor/datatables/js/jquery.dataTables.min.js',
					'js/plugins-init/datatables.init.js',
				],
				'EduminAdminController_all_departments' => [
					'vendor/datatables/js/jquery.dataTables.min.js',
					'js/plugins-init/datatables.init.js',
				],

				'EduminAdminController_all_staff' => [
					'vendor/datatables/js/jquery.dataTables.min.js',
					'js/plugins-init/datatables.init.js',
				],
				'EduminAdminController_all_holiday' => [
					'vendor/datatables/js/jquery.dataTables.min.js',
					'js/plugins-init/datatables.init.js',
				],

				'EduminAdminController_add_professor'=>[
					'vendor/pickadate/picker.js',
					'vendor/pickadate/picker.time.js',
					'vendor/pickadate/picker.date.js',
					'js/plugins-init/pickadate-init.js',

				],
				'EduminAdminController_add_fees'=>[
					'vendor/pickadate/picker.js',
					'vendor/pickadate/picker.time.js',
					'vendor/pickadate/picker.date.js',
					'js/plugins-init/pickadate-init.js',
				],

				'EduminAdminController_add_holiday'=>[
					'vendor/pickadate/picker.js',
					'vendor/pickadate/picker.time.js',
					'vendor/pickadate/picker.date.js',
					'js/plugins-init/pickadate-init.js',
				],

				'EduminAdminController_add_staff'=>[
					'vendor/pickadate/picker.js',
					'vendor/pickadate/picker.time.js',
					'vendor/pickadate/picker.date.js',
					'js/plugins-init/pickadate-init.js',
				],
				'EduminAdminController_add_departments'=>[
					'vendor/pickadate/picker.js',
					'vendor/pickadate/picker.time.js',
					'vendor/pickadate/picker.date.js',
					'js/plugins-init/pickadate-init.js',
				],
				'EduminAdminController_add_courses'=>[
					'vendor/pickadate/picker.js',
					'vendor/pickadate/picker.time.js',
					'vendor/pickadate/picker.date.js',
					'js/plugins-init/pickadate-init.js',
				],

				'EduminAdminController_add_library'=>[
					'vendor/pickadate/picker.js',
					'vendor/pickadate/picker.time.js',
					'vendor/pickadate/picker.date.js',
					'js/plugins-init/pickadate-init.js',
				],
				'EduminAdminController_add_student'=>[
					'vendor/pickadate/picker.js',
					'vendor/pickadate/picker.time.js',
					'vendor/pickadate/picker.date.js',
					'js/plugins-init/pickadate-init.js',
				],
				'EduminAdminController_edit_professor'=>[
					'vendor/pickadate/picker.js',
					'vendor/pickadate/picker.time.js',
					'vendor/pickadate/picker.date.js',
					'js/plugins-init/pickadate-init.js',
				],
				'EduminAdminController_edit_holiday'=>[
					'vendor/pickadate/picker.js',
					'vendor/pickadate/picker.time.js',
					'vendor/pickadate/picker.date.js',
					'js/plugins-init/pickadate-init.js',
				],
				'EduminAdminController_holiday_calendar'=>[
					'vendor/jqueryui/js/jquery-ui.min.js',
					'vendor/moment/moment.min.js',
					'vendor/fullcalendar/js/fullcalendar.min.js',
					'js/plugins-init/fullcalendar-init.js',
				],
				'EduminAdminController_edit_departments'=>[
					'vendor/pickadate/picker.js',
					'vendor/pickadate/picker.time.js',
					'vendor/pickadate/picker.date.js',
					'js/plugins-init/pickadate-init.js',
				],
				'EduminAdminController_edit_library'=>[
					'vendor/pickadate/picker.js',
					'vendor/pickadate/picker.time.js',
					'vendor/pickadate/picker.date.js',
					'js/plugins-init/pickadate-init.js',
				],

				'EduminAdminController_edit_staff'=>[
					'vendor/pickadate/picker.js',
					'vendor/pickadate/picker.time.js',
					'vendor/pickadate/picker.date.js',
					'js/plugins-init/pickadate-init.js',
				],
				'EduminAdminController_edit_courses'=>[
					'vendor/pickadate/picker.js',
					'vendor/pickadate/picker.time.js',
					'vendor/pickadate/picker.date.js',
					'js/plugins-init/pickadate-init.js',
				],
				'EduminAdminController_edit_student'=>[
					'vendor/pickadate/picker.js',
					'vendor/pickadate/picker.time.js',
					'vendor/pickadate/picker.date.js',
					'js/plugins-init/pickadate-init.js',
				],
				'EduminAdminController_job_list'=>[
					'vendor/datatables/js/jquery.dataTables.min.js',
					'js/plugins-init/datatables.init.js',
				],
				'EduminAdminController_celandar' => [
					'vendor/fullcalendar-5.11.0/lib/main.js',
					'vendor/wow-master/dist/wow.min.js',
					'js/calendar-2.js',
				],
				'EduminAdminController_job_application' => [
					'vendor/datatables/js/jquery.dataTables.min.js',
					'js/plugins-init/datatables.init.js',
				],

				'EduminAdminController_app_calender' => [
					'vendor/moment/moment.min.js',
					'vendor/fullcalendar/js/fullcalendar.min.js',
					'js/plugins-init/fullcalendar-init.js',
				],
				'EduminAdminController_content' => [
					'js/dashboard/cms.js',
					'vendor/bootstrap-datepicker-master/js/bootstrap-datepicker.min.js',

				],
				'EduminAdminController_content_add' => [
					'js/dashboard/cms.js',
					'vendor/ckeditor/ckeditor.js',
					'vendor/bootstrap-datepicker-master/js/bootstrap-datepicker.min.js',
					'vendor/select2/js/select2.full.min.js',
					'js/plugins-init/select2-init.js',

				],
				'EduminAdminController_menu' => [
					'js/dashboard/cms.js',
					'vendor/nestable2/js/jquery.nestable.min.js',
					'js/plugins-init/nestable-init.js',
				],
				'EduminAdminController_email_template' => [
					'js/dashboard/cms.js',
					'vendor/bootstrap-datepicker-master/js/bootstrap-datepicker.min.js',
				],
				'EduminAdminController_add_email' => [
					'js/dashboard/cms.js',
					'vendor/ckeditor/ckeditor.js',
				],
				'EduminAdminController_blog' => [
					'js/dashboard/cms.js',
					'vendor/bootstrap-datepicker-master/js/bootstrap-datepicker.min.js',
				],
				'EduminAdminController_add_blog' => [
					'vendor/ckeditor/ckeditor.js',
					'vendor/select2/js/select2.full.min.js',
					'js/plugins-init/select2-init.js',
					'js/dashboard/cms.js',
					'vendor/bootstrap-datepicker-master/js/bootstrap-datepicker.min.js',
					'vendor/tagify/dist/tagify.js',
				],
				'EduminAdminController_blog_category' => [
					'js/dashboard/cms.js',

				],

				'EduminAdminController_app_profile' => [
					'vendor/lightgallery/dist/lightgallery.min.js',
					'vendor/lightgallery/dist/plugins/thumbnail/lg-thumbnail.min.js',
					'vendor/lightgallery/dist/plugins/zoom/lg-zoom.min.js',

				],
				'EduminAdminController_post_details' => [
					'vendor/lightgallery/dist/lightgallery.min.js',
					'vendor/lightgallery/dist/plugins/thumbnail/lg-thumbnail.min.js',
					'vendor/lightgallery/dist/plugins/zoom/lg-zoom.min.js',

				],
				'EduminAdminController_chart_chartist' => [
					'vendor/apexchart/apexchart.js',
					'vendor/chartist/js/chartist.min.js',
					'vendor/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js',
					'js/plugins-init/chartist-init.js',
				],
				'EduminAdminController_chart_chartjs' => [
					'vendor/chart.js/Chart.bundle.min.js',
					'js/plugins-init/chartjs-init.js',
				],
				'EduminAdminController_chart_flot' => [
					'vendor/flot/jquery.flot.js',
					'vendor/flot/jquery.flot.pie.js',
					'vendor/flot/jquery.flot.resize.js',
					'vendor/flot-spline/jquery.flot.spline.min.js',
					'js/plugins-init/flot-init.js',

				],
				'EduminAdminController_chart_morris' => [

					'vendor/apexchart/apexchart.js',
					'vendor/raphael/raphael.min.js',
					'vendor/morris/morris.min.js',
					'js/plugins-init/morris-init.js',
				],
				'EduminAdminController_chart_peity' => [
					'vendor/peity/jquery.peity.min.js',
					'js/plugins-init/piety-init.js',
				],
				'EduminAdminController_chart_sparkline' => [
					'vendor/apexchart/apexchart.js',
					'vendor/jquery-sparkline/jquery.sparkline.min.js',
					'js/plugins-init/sparkline-init.js',
				],
				'EduminAdminController_ecom_checkout' => [
				],
				'EduminAdminController_ecom_customers' => [
				],
				'EduminAdminController_ecom_invoice' => [

				],
				'EduminAdminController_ecom_product_detail' => [
					'vendor/star-rating/jquery.star-rating-svg.js',
					'vendor/owl-carousel/owl.carousel.js',
				],
				'EduminAdminController_ecom_product_grid' => [
				],
				'EduminAdminController_ecom_product_list' => [
					'vendor/star-rating/jquery.star-rating-svg.js'
				],
				'EduminAdminController_ecom_product_order' => [
				],
				'EduminAdminController_email_compose' => [
					'vendor/dropzone/dist/dropzone.js'
				],
				'EduminAdminController_email_inbox' => [

				],
				'EduminAdminController_email_read' => [
				],
				'EduminAdminController_form_ckeditor' => [
					'vendor/ckeditor/ckeditor.js',
				],
				'EduminAdminController_form_element' => [
				],
				'EduminAdminController_form_pickers' => [
					'vendor/moment/moment.min.js',
					'vendor/bootstrap-daterangepicker/daterangepicker.js',
					'vendor/clockpicker/js/bootstrap-clockpicker.min.js',
					'vendor/jquery-asColor/jquery-asColor.min.js',
					'vendor/jquery-asGradient/jquery-asGradient.min.js',
					'vendor/jquery-asColorPicker/js/jquery-asColorPicker.min.js',
					'vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js',
					'vendor/pickadate/picker.js',
					'vendor/pickadate/picker.time.js',
					'vendor/pickadate/picker.date.js',
					'js/plugins-init/bs-daterange-picker-init.js',
					'js/plugins-init/clock-picker-init.js',
					'js/plugins-init/jquery-asColorPicker.init.js',
					'js/plugins-init/material-date-picker-init.js',
					'js/plugins-init/pickadate-init.js',
				],
				'EduminAdminController_form_validation_jquery' => [
				],
				'EduminAdminController_form_wizard' => [
					'vendor/jquery-steps/build/jquery.steps.min.js',
					'js/plugins-init/jquery.validate-init.js',
					'vendor/jquery-smartwizard/dist/js/jquery.smartWizard.js',
				],
				'EduminAdminController_map_jqvmap' => [
					'vendor/jqvmap/js/jquery.vmap.min.js',
					'vendor/jqvmap/js/jquery.vmap.world.js',
					'vendor/jqvmap/js/jquery.vmap.usa.js',
					'js/plugins-init/jqvmap-init.js',
				],
				'EduminAdminController_page_error_400' => [
				],
				'EduminAdminController_page_error_403' => [
				],
				'EduminAdminController_page_error_404' => [
				],
				'EduminAdminController_page_error_500' => [
				],
				'EduminAdminController_page_error_503' => [
				],
				'EduminAdminController_page_forgot_password' => [
				],
				'EduminAdminController_page_lock_screen' => [
					'vendor/deznav/deznav.min.js'
				],
				'EduminAdminController_page_login' => [
				],
				'EduminAdminController_page_register' => [
				],
				'EduminAdminController_table_bootstrap_basic' => [

				],
				'EduminAdminController_table_datatable_basic' => [
					'vendor/datatables/js/jquery.dataTables.min.js',
					'vendor/datatables/js/dataTables.responsive.min.js',
					'js/plugins-init/datatables.init.js',



				],
				'EduminAdminController_edit_profile' => [
					'vendor/bootstrap-datepicker-master/js/bootstrap-datepicker.min.js',

				],
				'EduminAdminController_uc_lightgallery' => [
					'vendor/lightgallery/dist/lightgallery.min.js',
					'vendor/lightgallery/dist/plugins/thumbnail/lg-thumbnail.min.js',
					'vendor/lightgallery/dist/plugins/zoom/lg-zoom.min.js',
				],
				'EduminAdminController_my_profile' => [
					'vendor/apexchart/apexchart.js',
					'js/dashboard/my-profile.js',
				],
				'EduminAdminController_uc_nestable' => [
					'vendor/nestable2/js/jquery.nestable.min.js',
					'js/plugins-init/nestable-init.js',
				],
				'EduminAdminController_uc_noui_slider' => [
					'vendor/nouislider/nouislider.min.js',
					'vendor/wnumb/wNumb.js',
					'js/plugins-init/nouislider-init.js',
				],
				'EduminAdminController_uc_select2' => [
					'vendor/select2/js/select2.full.min.js',
					'js/plugins-init/select2-init.js',
				],
				'EduminAdminController_uc_sweetalert' => [
					'vendor/sweetalert2/dist/sweetalert2.min.js',
					'js/plugins-init/sweetalert.init.js',
				],
				'EduminAdminController_uc_toastr' => [
					'vendor/toastr/js/toastr.min.js',
					'js/plugins-init/toastr-init.js',
				],
				'EduminAdminController_ui_accordion' => [

				],
				'EduminAdminController_ui_alert' => [

				],
				'EduminAdminController_ui_badge' => [

				],
				'EduminAdminController_ui_button' => [

				],
				'EduminAdminController_ui_button_group' => [

				],
				'EduminAdminController_ui_card' => [

				],
				'EduminAdminController_ui_carousel' => [

				],
				'EduminAdminController_ui_dropdown' => [

				],
				'EduminAdminController_ui_grid' => [
				],
				'EduminAdminController_ui_list_group' => [

				],
				'EduminAdminController_ui_media_object' => [
				],
				'EduminAdminController_ui_modal' => [
				],
				'EduminAdminController_ui_pagination' => [

				],
				'EduminAdminController_ui_popover' => [
				],
				'EduminAdminController_ui_progressbar' => [

				],
				'EduminAdminController_ui_tab' => [

				],
				'EduminAdminController_ui_typography' => [
				],
				'EduminAdminController_widget_card' => [
				],
				'EduminAdminController_widget_basic' => [
					'vendor/chart.js/Chart.bundle.min.js',
					'vendor/apexchart/apexchart.js',
					'vendor/chartist/js/chartist.min.js',
					'vendor/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js',
					'vendor/flot/jquery.flot.js',
					'vendor/flot/jquery.flot.pie.js',
					'vendor/flot/jquery.flot.resize.js',
					'vendor/flot-spline/jquery.flot.spline.min.js',
					'vendor/jquery-sparkline/jquery.sparkline.min.js',
					'js/plugins-init/sparkline-init.js',
					'vendor/peity/jquery.peity.min.js',
					'js/plugins-init/piety-init.js',
					'js/plugins-init/widgets-script-init.js',
				],


			]
		],
	]
];
