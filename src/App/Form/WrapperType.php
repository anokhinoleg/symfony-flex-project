<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 07.02.18
 * Time: 19:14
 */

namespace App\App\Form;

use App\App\Entity\Users;
use App\App\Entity\UsersAbout;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Button;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WrapperType extends AbstractType
{
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('filters', CollectionType::class, array(
            'entry_type' => FilterType::class,
            'entry_options' => array('label' => false),
            'allow_add' => true,
        ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }
}