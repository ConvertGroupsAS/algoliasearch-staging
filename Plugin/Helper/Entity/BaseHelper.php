<?php

namespace Convert\AlgoliaSearchStaging\Plugin\Helper\Entity;

use Magento\Framework\EntityManager\MetadataPool;

class BaseHelper
{

    protected $metadataPool;

    public function aroundGetIdColumn(
        \Algolia\AlgoliaSearch\Helper\Entity\BaseHelper $subject,
        $procede
    ) {         
        $metadata = $this->getMetadataPool()->getMetadata(\Magento\Catalog\Api\Data\CategoryInterface::class);
        $linkField = $metadata->getLinkField();
    }

    /**
     * @return \Magento\Framework\EntityManager\MetadataPool
     */
    private function getMetadataPool()
    {
        if (null === $this->metadataPool) {
            $this->metadataPool = \Magento\Framework\App\ObjectManager::getInstance()
                ->get('Magento\Framework\EntityManager\MetadataPool');
        }
        return $this->metadataPool;
    }
}
