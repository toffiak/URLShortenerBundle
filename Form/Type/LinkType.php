<?php

namespace Toffiak\URLShortenerBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LinkType extends AbstractType
{

    private $class;

    /**
     * @param string $class The Link class name
     */
    public function __construct($class)
    {
        $this->class = $class;
    }

    /**
     * Building form
     * 
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('original_url', 'url', array('label' => 'form.original_url', 'required' => false, 'translation_domain' => 'ToffiakURLShortenerBundle'))
        ;
    }

    /**
     * Setting default options
     * 
     * @param \Symfony\Component\OptionsResolver\OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->class,
        ));
    }

    /**
     * Getting form name
     * 
     * @return string
     */
    public function getName()
    {
        return 'toffiak_urlshortenerbundle_link';
    }

}
