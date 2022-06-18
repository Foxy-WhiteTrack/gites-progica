<?php

namespace App\Form;

use App\Entity\Equipement;
use App\Entity\Gite;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Doctrine\DBAL\Types\FloatType;


class GiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'required' => false,
                'label' => 'Nom du gite'
            ])
            ->add('description', TextType::class, [
                'required' => false,
                'label' => 'Description du gite'
            ])
            ->add('surface', NumberType::class, [
                'required' => false,
                'label' => 'Surface en m2'
            ])
            ->add('chambre', NumberType::class, [
                'required' => false,
                'label' => 'Nbr de chambre'
            ])
            ->add('couchage', NumberType::class, [
                'required' => false,
                'label' => 'Nbr de couchage'
            ])
            ->add('equipements', EntityType::class, [
                'required' => false,
                "class" => Equipement::class,
                "choice_label" => "name",
                "multiple" => true,
            ])
            ->add('animaux', CheckboxType::class, [
                'required' => false,
                'label' => 'Cocher la case si les animaux sont acceptés',
            ])
            ->add('tarifAnimaux', NumberType::class, [
                'required' => false,
                'label' => 'Tarif Animaux'
            ])
            ->add('tarifBasseSaison', NumberType::class, [
                'required' => false,
                'label' => 'Tarif Hebdomadaire en Basse Saison'
            ])
            ->add('tarifHauteSaison', NumberType::class, [
                'required' => false,
                'label' => 'Tarif Hebdomadaire en Haute Saison'
            ])
            ->add('ville', TextType::class, [
                'required' => false
            ])
            ->add('departement', TextType::class, [
                'required' => false
            ])
            ->add('region', TextType::class, [
                'required' => false
            ])
            ->add('coordonneeProprio', TextType::class, [
                'required' => false,
                'label' => 'Coordonnées du propriétaire'
            ])
            ->add('coordonneeContact', TextType::class, [
                'required' => false,
                'label' => 'Coordonnées de la personne à contacter'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Gite::class,
        ]);
    }
}
