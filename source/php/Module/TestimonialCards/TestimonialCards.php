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

        $data['ID'] = $this->ID;

        //Send to view
        return $data;
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
