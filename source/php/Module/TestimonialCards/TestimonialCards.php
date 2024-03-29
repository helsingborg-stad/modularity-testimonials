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

        $data['testimonials']   = get_field('modularity-testimonial-cards', $this->ID);
        $data['isCarousel']     = get_field('is_carousel', $this->ID);
        $data['slidesPerPage']  = get_field('slides_per_page', $this->ID);
        $data['ariaLabels'] =  (object) [
            'prev' => __('Previous slide','modularity'),
            'next' => __('Next slide', 'modularity'),
            'first' => __('Go to first slide', 'modularity'),
            'last' => __('Go to last slide','modularity'),
            'slideX' => __('Go to slide %s', 'modularity'),
        ];


        //Get the resized images
        if (isset($data['testimonials']) && is_array($data['testimonials']) && !empty($data['testimonials'])) {
            foreach ($data['testimonials'] as &$testimonial) {
                $testimonial['image'] = $this->getResizedImageUrl($testimonial['image']);
            }
        }

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

        if ($image = wp_get_attachment_image_src($imageObject['id'], array(160, 240))) {
            if (is_array($image) && count($image) == 4) {
                return $image[0];
            }
        }

        return null;
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
