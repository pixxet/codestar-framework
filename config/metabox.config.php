<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// METABOX OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options = array();

// -----------------------------------------
// Post Metabox Options										-
// -----------------------------------------
$options[] = array(
  'id'         => 'post_options',
  'title'      => __('Post Options', 'pxt-pixxet-theme' ),
  'post_type'  => 'post',
  'context'    => 'side',
  'priority'   => 'high',
  'sections'   => array(
    array(
      'name'    => 'post_vars',
      'fields'  => array(
        array(
          'id'    => 'home',
          'type'  => 'switcher',
          'title' => __('Show in home page?', 'pxt-pixxet-theme' ),
          'label' => __('Yes', 'pxt-pixxet-theme' ),
        ),

        array(
          'id'    => 'hide-infos',
          'type'  => 'switcher',
          'title' => __('Hide post infos?', 'pxt-pixxet-theme' ),
          'label' => __('Yes', 'pxt-pixxet-theme' ),
        ),
      ),
    ),
  ),
);

$options[] = array(
  'id'         => 'post_options',
  'title'      => __('Post Options', 'pxt-pixxet-theme' ),
  'post_type'  => 'page',
  'context'    => 'side',
  'priority'   => 'high',
  'sections'   => array(
    array(
      'name'    => 'post_vars',
      'fields'  => array(
        array(
          'id'    => 'home',
          'type'  => 'switcher',
          'title' => __('Show in home page?', 'pxt-pixxet-theme' ),
          'label' => __('Yes', 'pxt-pixxet-theme' ),
        ),
      ),
    ),
  ),
);


$options[] = array(
  'id'            => 'post_options_video_gallery',
  'title'         => __('Gallery / Video Options', 'pxt-pixxet-theme'),
  'post_type'     => 'post', // or post or CPT
  'context'       => 'normal',
  'priority'      => 'default',
  'sections'      => array(

    
    array(
      'name'      => 'vars',
      'fields'    => array(


        // gallery
        array(
          'id'              => 'gallery',
          'type'            => 'group',
          'title'           => __('Gallery', 'pxt-pixxet-theme'),
          'button_title'    => __('Add New', 'pxt-pixxet-theme'),
          'accordion_title' => __('Add New Field', 'pxt-pixxet-theme'),
          'fields'          => array(
            array(
              'id'          => 'gallery_content',
              'type'        => 'gallery',
              'title'       => __('Gallery', 'pxt-pixxet-theme'),
              'add_title'   => __('Add Images', 'pxt-pixxet-theme'),
              'edit_title'  => __('Edit Images', 'pxt-pixxet-theme'),
              'clear_title' => __('Remove Images', 'pxt-pixxet-theme'),
            ),
            array(
              'id'       => 'link',
              'type'     => 'select',
              'title'    => __( 'link to', 'pxt-pixxet-theme' ),
              'options'  => array(
                  'none' => __( 'none', 'pxt-pixxet-theme' ),
                  'post' => __( 'Attachment page', 'pxt-pixxet-theme' ),
                  'file' => __( 'Attachment file', 'pxt-pixxet-theme' ),
                ),
              'class'    => 'chosen',
            ),
            array(
              'id'       => 'column',
              'type'     => 'select',
              'title'    => __( 'Columns', 'pxt-pixxet-theme' ),
              'options'  => array(
                  1 => 12,
                  2 => 6,
                  3 => 4,
                  4 => 3,
                  6 => 2,
                  12 => 1,
                ),
              'class'    => 'chosen',
            ),
            array(
              'id'       => 'size',
              'type'     => 'select',
              'title'    => __( 'Size', 'pxt-pixxet-theme' ),
              'options'  => pxt_get_thumb_sizes(),
              'class'    => 'chosen',
            ),

            array(
              'id'       => 'max-images',
              'type'     => 'number',
              'title'    => __( 'Max image per gallery-slide', 'pxt-pixxet-theme' ),
            ),
          ),
        ),


        //video
        array(
          'id'        => 'video',
          'type'      => 'fieldset',
          'title'     => 'Video',
          'fields'    => array(

            array(
              'id'    => 'url',
              'type'  => 'text',
              'title' => __('Video URL:', 'pxt-pixxet-theme'),
              'dependency' => array('video_file_%s','==',''),
              'validate'       => true,
            ),

            array(
              'id'             => 'network_type',
              'type'           => 'select',
              'title'          => __('Network Type', 'pxt-pixxet-theme'),
              'options'        => array(
                'youtube'          => __('YouTube', 'pxt-pixxet-theme'),
                  'vimeo'          => __('Vimeo', 'pxt-pixxet-theme'),
                  'dailymotion'    => __('Dailymotion', 'pxt-pixxet-theme'),
                  //'silverlight'  => __('Silverlight', 'pxt-pixxet-theme'),
                  'other'          => __('Other', 'pxt-pixxet-theme'),
              ),
              'default_option' => '',
              'class'          => 'chosen',
              'dependency'     => array('url_%s','!=',''),
              'validate'       => true,
            ),

            array(
              'id'    => 'video_file',
              'type'  => 'upload',
              'title' => __('Video File:', 'pxt-pixxet-theme'),
              'settings'      => array(
                 'upload_type'  => 'video',
                 'button_title' => __('Video', 'pxt-pixxet-theme'),
                 'frame_title'  => __('Select a video', 'pxt-pixxet-theme'),
                 'insert_title' => __('Use this video', 'pxt-pixxet-theme'),
               ),
              'dependency' => array('url_%s','==',''),
              'validate'       => true,
            ),

            array(
              'id'             => 'video_type',
              'type'           => 'select',
              'title'          => __('Video Type', 'pxt-pixxet-theme'),
              'options'        => array(
                'mp4'       => 'Mp4',
                  'mp3'       => 'MP3',
                  'webm'      => 'WebM',
              ),
              'default_option' => '',
              'class'          => 'chosen',
              'desc'           => __('(Optional)', 'pxt-pixxet-theme'),
              'dependency' => array('video_file_%s','!=',''),
              'validate'       => true,
            ),

          ),
        ),
      ),
    ),

  ),
);





$options[] = array(
  'id'            => 'slider_vals',
  'title'         => __('Gallery / Video Options', 'pxt-pixxet-theme'),
  'post_type'     => 'slider', // or post or CPT
  'context'       => 'normal',
  'priority'      => 'default',
  'sections'      => array(

    
    array(
      'name'      => 'vars',
      'fields'    => array(


        // items
        array(
          'id'              => 'items',
          'type'            => 'group',
          'title'           => __('Items', 'pxt-pixxet-theme'),
          'button_title'    => __('Add New', 'pxt-pixxet-theme'),
          'accordion_title' => __('Add New Item', 'pxt-pixxet-theme'),
          'fields'          => array(

            array(
              'id'           => 'item-mode',
              'type'         => 'button_set',
              'title'        => __('Slide', 'redux-framework-demo'),
              'subtitle'     => __('Choose the type of the slide', 'redux-framework-demo'),
              //Must provide key => value pairs for options
              'options'      => array(
                'image'    => __( 'Image', 'pxt-pixxet-theme' ),
                'gallery'    => __( 'Gallery', 'pxt-pixxet-theme' ),
                'video'     => __( 'Video', 'pxt-pixxet-theme' ),
               ), 
              'default'      => 'image',

            ),

            array(
              'id'     => 'img',
              'type'   => 'image',
              'title' => __( 'Image', 'pxt-pixxet-theme' ) . ' <i class="pxt pxt-desktop"></i>',
              'desc' => __( 'Add an image', 'pxt-pixxet-theme' ),
              'dependency' => array('item-mode','==','image'),
            ),

            array(
              'id'     => 'img_sm',
              'type'   => 'image',
              'title' => __( 'Image Tablet', 'pxt-pixxet-theme' ) . ' <i class="pxt pxt-tablet"></i>',
              'desc' => __( 'Add an image', 'pxt-pixxet-theme' ),
              'dependency' => array('item-mode','==','image'),
            ),

            array(
              'id'     => 'img_xs',
              'type'   => 'image',
              'title' => __( 'Image Mobile', 'pxt-pixxet-theme' ) . ' <i class="pxt pxt-mobile"></i>',
              'desc' => __( 'Add an image', 'pxt-pixxet-theme' ),
              'dependency' => array('item-mode','==','image'),
            ),

            array(
              'id'          => 'gallery_content',
              'type'        => 'gallery',
              'title'       => __('Gallery with Custom Title', 'pxt-pixxet-theme'),
              'add_title'   => __('Add Images', 'pxt-pixxet-theme'),
              'edit_title'  => __('Edit Images', 'pxt-pixxet-theme'),
              'clear_title' => __('Remove Images', 'pxt-pixxet-theme'),
              'dependency' => array('item-mode','==','gallery'),
            ),


            //video
            array(
              'id'        => 'video',
              'type'      => 'fieldset',
              'title'     => 'Video',
              'fields'    => array(

                array(
                  'id'    => 'url',
                  'type'  => 'text',
                  'title' => __('Video URL:', 'pxt-pixxet-theme'),
                  'dependency' => array('video_file_%s','==',''),
                  'validate'       => true,
                ),

                array(
                  'id'             => 'network_type',
                  'type'           => 'select',
                  'title'          => __('Network Type', 'pxt-pixxet-theme'),
                  'options'        => array(
                    'youtube'          => __('YouTube', 'pxt-pixxet-theme'),
                      'vimeo'          => __('Vimeo', 'pxt-pixxet-theme'),
                      'dailymotion'    => __('Dailymotion', 'pxt-pixxet-theme'),
                      //'silverlight'  => __('Silverlight', 'pxt-pixxet-theme'),
                      'other'          => __('Other', 'pxt-pixxet-theme'),
                  ),
                  'default_option' => '',
                  'class'          => 'chosen',
                  'dependency'     => array('url_%s','!=',''),
                  'validate'       => true,
                ),

                array(
                  'id'    => 'video_file',
                  'type'  => 'upload',
                  'title' => __('Video File:', 'pxt-pixxet-theme'),
                  'settings'      => array(
                     'upload_type'  => 'video',
                     'button_title' => __('Video', 'pxt-pixxet-theme'),
                     'frame_title'  => __('Select a video', 'pxt-pixxet-theme'),
                     'insert_title' => __('Use this video', 'pxt-pixxet-theme'),
                   ),
                  'dependency' => array('url_%s','==',''),
                  'validate'       => true,
                ),

                array(
                  'id'             => 'video_type',
                  'type'           => 'select',
                  'title'          => __('Video Type', 'pxt-pixxet-theme'),
                  'options'        => array(
                    'mp4'       => 'Mp4',
                      'mp3'       => 'MP3',
                      'webm'      => 'WebM',
                  ),
                  'default_option' => '',
                  'class'          => 'chosen',
                  'desc'           => __('(Optional)', 'pxt-pixxet-theme'),
                  'dependency' => array('video_file_%s','!=',''),
                  'validate'       => true,
                ),

              ),

              'dependency' => array('item-mode','==','video'),
            ),


          ),
        ),


        
      ),
    ),

  ),
);


function pxt_get_thumb_sizes() {
  $sizes = get_intermediate_image_sizes();
  $return_sizes = Array();

  foreach ($sizes as $size) {
    $return_sizes[$size] = $size;
  }

  return $return_sizes;
}

CSFramework_Metabox::instance( $options );
