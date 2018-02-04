<?php
/**
 * Created by PhpStorm.
 * User: olegyurievich
 * Date: 04.02.18
 * Time: 11:57
 */

namespace App\App\Form;

use App\App\Entity\Users;
use App\App\Entity\UsersAbout;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Button;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use function var_dump;

class FilterType extends AbstractType
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('filter_by', ChoiceType::class, [
                'choices' =>  array_flip($this->em->getClassMetadata(Users::class)->getColumnNames())
            ])
            ->add('value', TextType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

}