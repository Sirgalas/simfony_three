<?php

namespace App\Form;

use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('image',FileType::class,[
                    'label'=>'Главное изображение',
                    'label_attr'=>['class'=>'custom-file-label'],
                    'attr'=>['class'=>'custom-file-input'],
                    'required'=>false,
                    'mapped'=>false
                ])
            ->add('title',TextType::class,[
                'label'=>'Введите название категории',
                'attr'=>[
                    'placeholder'=>'Название',
                    'class'=>'form-control'
                ]
            ])
            ->add('description',TextareaType::class,[
                'label'=>'Введите описание категории',
                'attr'=>[
                    'placeholder'=>'Описание',
                     'class'=>'form-control tinymce'
                ]
            ])
            ->add('save',SubmitType::class,[
                'label'=>'Сохранить',
                'attr'=>[
                    'class'=>'btn btn-success'
                ]
            ])
            ->add('delete',SubmitType::class,[
                'label'=>'Удалить',
                'attr'=>[
                    'class'=>'btn btn-danger'
                ]
            ]);;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Category::class,
        ]);
    }
}
