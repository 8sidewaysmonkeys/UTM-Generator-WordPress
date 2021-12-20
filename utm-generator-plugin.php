<?php
/*
Plugin Name: UTM Generator For Wordpress
Plugin URI: https://8sidewaysmonkeys.com/
Description: Plugin to generate a UTM link
Version: 1.0
Author: 8 Sideways Monkeys
Author URI: https://8sidewaysmonkeys.com/
License: GPLv2 or later
Text Domain: 8sidewaysmonkeys 
*/


function custom_meta_box_markup() { ?>
    <div id="utm-gen-con">
    	<div id="thisUrlCon" class="mb-3">Generating for<br><small id="thisUrl"><?php echo get_permalink();?></small></div>
        <form id="utmGen">
            <div class="form-group mb-2">
                <label for="name">Campaign Name</label><br>
                <input type="text" name="name" id="name" class="form-control" placeholder="Campaign Name">
                <div>
                	<small class="form-text text-muted">
                    Campaign-based tracking tags group all of the content from one campaign in your analytics. Ex: Fall Sale
                    <br>
                    One of campaign name or campaign id are required.
                	</small>
                </div>
            </div>
            <div class="form-group mb-2">
                <label for="id">Campaign ID</label><br>
                <input type="text" name="id" id="id" class="form-control" placeholder="Campaign ID">
                <div>
                	<small class="form-text text-muted">
                        The ads campaign id.
                        <br>
                        One of campaign name or campaign id are required.
                    </small>
                </div>
            </div>
            <div class="form-group mb-2">
                <label for="source">Source*</label><br>
                <input type="text" name="source" id="source" class="form-control" placeholder="Source" required>
                <div>
                	<small class="form-text text-muted">
                        A source-based URL parameter can tell you which website is sending you traffic. Ex: Facebook, newsletter
                    </small>
                </div>
            </div>
            <div class="form-group mb-2">
                <label for="medium">Medium*</label><br>
                <input type="text" id="medium" class="form-control" placeholder="Medium" required>
                <div>
                	<small class="form-text text-muted">
                        This type of tracking tag informs you of the medium that your tracked link is featured in. Ex: Social Media, email, banner
                    </small>
                </div>
            </div>
            <div class="form-group mb-2">
                <label for="term">Term</label><br>
                <input type="text" id="term" class="form-control" placeholder="Term">
                <div>
                	<small class="form-text text-muted">
                        Identify the paid keywords
                    </small>
                </div>
            </div>  
            
            <div class="form-group mb-2">
                <label for="content">Content</label><br>
                <input type="text" id="content" class="form-control" placeholder="Content">
                <div>
                	<small class="form-text text-muted">
                        This type of UTM code is used to track the specific types of content that point to the same destination from a common source and medium. Ex: Side Bar Link
                    </small>
                </div>
            </div>               
            
            <button type="submit" id="getUTM" class="btn btn-primary">Generate</button>
            <div id="outputBox" class="mt-2"></div>
        </form>

        <div id="generatedLink"></div>
    </div>
<?php }

function add_utm_gen_box(){
	wp_enqueue_script('utm-gen-js', plugin_dir_url(__FILE__) . 'utm-gen-js.js', array('jquery'));
	wp_enqueue_style('utm-gen-css', plugin_dir_url(__FILE__) . 'utm-gen-css.css');
	$post_types = get_post_types(array('public' => true));
    add_meta_box("utm_gen_box", "UTM Generator", "custom_meta_box_markup", $post_types, "normal", "high", null);
}

add_action("add_meta_boxes", "add_utm_gen_box");