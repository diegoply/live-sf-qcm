<?php

namespace App\Form;

use App\Entity\Question;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class QuestionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('libelle', TextType::class, ['label' => 'Libellé de la question'])
            ->add('reponse1', TextType::class, ['label' => 'Réponse 1'])
            ->add('reponse2', TextType::class, ['label' => 'Réponse 2'])
            ->add('reponse3', TextType::class, [
                'label' => 'Réponse 3',
                'required' => false,
                ])
            ->add('reponse4', TextType::class, [
                'label' => 'Réponse 4',
                'required' => false,])
            ->add('reponse5', TextType::class, [
                'label' => 'Réponse 5',
                'required' => false,])
            ->add('point', NumberType::class, ['label' => 'Nombre de points'])
            ->add('image', FileType::class, ['label' => 'Image', 'required'=>false])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Question::class,
        ]);
    }
}
