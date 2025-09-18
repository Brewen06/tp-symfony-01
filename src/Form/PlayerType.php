<?php
namespace App\Form;

use App\Entity\Player;
use App\Form\PlayerType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class PlayerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('name', TextType::class, ['label' => "Nom du joueur"]);
        $builder->add('xp', IntegerType::class, ['label' => "Expérience (XP)"]);
        $builder->add('level');
        $builder->add('groups');
        $builder->add('categories', EntityType::class, [
            'class' => 'App\Entity\Category',
            'choice_label' => 'name',
            'label' => 'Catégorie',
            'multiple' => true,
            'expanded' => false,
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Player::class,
        ]);
    }
}