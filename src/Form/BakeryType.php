<?php

namespace App\Form;

use App\Entity\Bakery;
use App\Entity\User;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BakeryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class)
            ->add('address', TextType::class)
            ->add('profile_img')
            ->add('phone_number')
            ->add('rating')
            ->add('status', ChoiceType::class, [
                'choices'  => [
                    'Active' => '1',
                    'Desactivé' => '0'
                ],
                'expanded' => true])
            ->add('delivery_fees')
            ->add('delivery_time')
            ->add('user', EntityType::class, [
                'class' => User::class,
                'attr' => ['class' => 'form-control'],
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('g')
                        ->orderBy('g.name', 'ASC');
                },
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => false,
            ])
            ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Bakery::class,
        ]);
    }
}
