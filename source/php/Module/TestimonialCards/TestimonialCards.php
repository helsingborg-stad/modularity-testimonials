<?php

namespace ModularityTestimonials\Module;

class TestimonialCards extends \Modularity\Module
{
    public $slug = 'testimonial-cards';
    public $supports = array();

    public function init()
    {
        $this->nameSingular = __("Testimonial Cards", 'modularity-testimonials');
        $this->namePlural = __("Testimonial Cards", 'modularity-testimonials');
        $this->description = __("Display card-style testimonials", 'modularity-testimonials');
    }

    public function data() : array
    {
        $data = array();

        $data['testimonials'] = get_field('modularity-testimonial-cards', $this->ID);
        $data['isCarousel'] = get_field('is_carousel', $this->ID);

        if (isset($data['testimonials']) && is_array($data['testimonials']) && !empty($data['testimonials'])) {
            foreach ($data['testimonials'] as &$testimonial) {
                $testimonial['image_resize'] = $this->getResizedImageUrl($testimonial['image']);
            }
        }

        //Set image url
        foreach($data['testimonials'] as &$testimonial) {
            $testimonial['image'] = $testimonial['image']['url'];
        }

        //Generate a section id
        $data['sectionID'] = sanitize_title($this->post_title);

        //Get flickity settings
        $data['flickitySettings'] = $this->flickitySettings();

        //Send to view
        return $data;
    }

    public function getResizedImageUrl($imageObject)
    {
        if (!isset($imageObject['id'])) {
            return null;
        }

        if (isset($imageObject['id']) && !is_numeric($imageObject['id'])) {
            return null;
        }

        if ($image = wp_get_attachment_image_src($imageObject['id'], array(290, 435))) {
            if (is_array($image) && count($image) == 4) {
                return $image[0];
            }
        }

        return null;
    }

    public function flickitySettings()
    {
        return json_encode(array(
            'cellSelector' => '.js-slider',
            'cellAlign' => 'center',
            'wrapAround' => false,
            'pageDots' => false,
            'freeScroll' => false,
            'groupCells' => false,
            'setGallerySize' => true,
            'watchCSS' => true,
            'autoPlay' => 3000,
            'pauseAutoPlayOnHover' => true,
            'wrapAround' => true
        ));
    }

    public function template() : string
    {
        return "testimonial-cards.blade.php";
    }

    /**
     * Available "magic" methods for modules:
     * init()            What to do on initialization
     * data()            Use to send data to view (return array)
     * style()           Enqueue style only when module is used on page
     * script            Enqueue script only when module is used on page
     * adminEnqueue()    Enqueue scripts for the module edit/add page in admin
     * template()        Return the view template (blade) the module should use when displayed
     */
}
