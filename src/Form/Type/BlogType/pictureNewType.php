<?php
namespace App\Form\Type\BlogType;

use App\Entity\Picture;

use Doctrine\DBAL\Types\TextType as TypesTextType;
use Symfony\Component\Form\Extension\Core\Type\BaseType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Vich\UploaderBundle\Form\Type\VichImageType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class pictureNewType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('imageFile', FileType::class, array(
            'label'         => 'Upload an image(jpg/jpeg/png)',
            'required'      => true,
            'attr'          => array(
                'accept'        => 'image/png, image/jpg, image/jpeg',
            ),
        ));

        $builder->add('title', TextType::class, array(
            'label'         => 'Title',
            'required'      => true,
            'empty_data'    => '',
            'attr'          => array(
                'class'         => 'form-control',
                'placeholder'   => 'give your picture a title',
            ),
        ));

        $builder->add('description', TextareaType::class, array(
            'label'         => 'Description',
            'required'      => true,
            'empty_data'    => '',
            'attr'          => array(
                'class'         => 'form-control',
                'placeholder'   => 'write something about it',
                'rows'          => '3',
            ),
        ));
    }

    public function getBlockPrefix()
    {
        return ('pictureNew');
    }

    public function configureOptions(OptionsResolver $res)
    {
        $res->setDefaults(array(
            'data-class' => Picture::class,
        ));
    }
}