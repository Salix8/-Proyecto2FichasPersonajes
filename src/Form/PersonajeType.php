<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use App\Entity\Provincia;

class PersonajeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', TextType::class)
            ->add('raza', TextType::class)
            ->add('clase', TextType::class)
            ->add('nivel', NumberType::class)
            ->add('fuerza', NumberType::class)
            ->add('destreza', NumberType::class)
            ->add('constitucion', NumberType::class)
            ->add('inteligencia', NumberType::class)
            ->add('sabiduria', NumberType::class)
            ->add('carisma', NumberType::class)
            ->add('descripcion', TextareaType::class, array('required' => false))
            ->add('equipamiento', TextareaType::class, array('required' => false))
            ->add('rasgo', HiddenType::class, array('mapped' => false))
            ->add('save', SubmitType::class);
    }
}