<?php

namespace Magenteiro\Comments\Setup\Patch\Data;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\PatchRevertableInterface;

class AddDummyComments implements DataPatchInterface, PatchRevertableInterface
{
    private ModuleDataSetupInterface $moduleDataSetup;

    public function __construct(ModuleDataSetupInterface $moduleDataSetup)
    {
        $this->moduleDataSetup = $moduleDataSetup;
    }
    /**
     * Get array of patches that have to be executed prior to this.
     *
     * Example of implementation:
     *
     * [
     *      \Vendor_Name\Module_Name\Setup\Patch\Patch1::class,
     *      \Vendor_Name\Module_Name\Setup\Patch\Patch2::class
     * ]
     *
     * @return string[]
     */
    public static function getDependencies(){
        return[];
    }

    /**
     * Get aliases (previous names) for the patch.
     *
     * @return string[]
     */
    public function getAliases(){
        return[];
    }

    /**
     * Run code inside patch
     * If code fails, patch must be reverted, in case when we are speaking about schema - then under revert
     * means run PatchInterface::revert()
     *
     * If we speak about data, under revert means: $transaction->rollback()
     *
     * @return $this
     */
    public function apply(){
        $this->moduleDataSetup->startSetup();
        $table = $this->moduleDataSetup->getTable('magenteiro_comments');
        $this->moduleDataSetup->getConnection()->insert($table, [
            'product_id' => 1,
            'customer_id'=> 2,
            'comment'=> 'Comentario de teste'

        ]);
        $this->moduleDataSetup->getConnection()->insertMultiple($table, [
            'product_id' => 1,
            'customer_id'=> 2,
            'comment'=> 'Comentario de teste'
        ],
        [
            'product_id' => 2,
            'customer_id'=> 22,
            'comment'=> 'Comentario de teste'
        ],
        [
            'product_id' => 3,
            'customer_id'=> 10,
            'comment'=> 'Comentario de teste'
        ]);
        $this->moduleDataSetup->endSetup();
    }

    public function revert(){
        $this->moduleDataSetup->startSetup();
        $table = $this->moduleDataSetup->getTable('magenteiro_comments');
        $this->moduleDataSetup->getConnection()->delete($table, "comment like 'Comentário de test%'");
        $this->moduleDataSetup->endSetup();
    }
}
