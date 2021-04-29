<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Post;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostType extends AbstractType
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
                'label'=>'Введите название поста',
                'attr'=>[
                    'placeholder'=>'Название',
                    'class'=>'form-control'
                ]
            ])
            ->add('description',TextareaType::class,[
                'label'=>'Введите содержание поста',
                'attr'=>[
                    'placeholder'=>'Описание',
                    'class'=>'form-control tinymce'
                ]
            ])
            ->add('author',EntityType::class,[
                'class'=>User::class,
                'choice_label' => function (User $author) {
                    return $author->getEmail();
                },
                'attr'=>[
                    'class'=>'form-control js-select-two',
                    'placeholder'=>'Выберите пользователя'
                ]
            ])
            ->add('category',EntityType::class,[
                'class'=>Category::class,
                'choice_label' => function (Category $category) {
                    return $category->getTitle();
                },
                'attr'=>[
                    'class'=>'form-control js-select-two',
                    'placeholder'=>'Выберите категорию',
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
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
