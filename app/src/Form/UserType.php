<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => "Введите email",
                'attr'=>[
                    'class'=>'form-control'
                ]
            ])
            ->add('confirmPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'first_options' => [
                    'label' => 'Пароль',
                    'attr'=>[
                        'class'=>'form-control required'
                    ]
                ],
                'second_options' => [
                    'label' => 'Повтор пароля',
                    'attr'=>[
                        'class'=>'form-control'
                    ]
                ],

            ])
            ->add('save',SubmitType::class,[
                'label'=>'Сохранить',
                'attr'=>[
                    'class'=>'btn btn-success col-2'
                ]
            ])
            ->add('delete',SubmitType::class,[
                'label'=>'Удалить',
                'attr'=>[
                    'class'=>'btn btn-danger col-2'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
