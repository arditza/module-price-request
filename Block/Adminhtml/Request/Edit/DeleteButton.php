<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare (strict_types = 1);

namespace Azra\PriceRequest\Block\Adminhtml\Request\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class DeleteButton extends GenericButton implements ButtonProviderInterface {

	/**
	 * @return array
	 */
	public function getButtonData() {
		$data = [];
		if ($this->getModelId()) {
			$data = [
				'label' => __('Delete Price Request'),
				'class' => 'delete',
				'on_click' => 'deleteConfirm(\'' . __(
					'Are you sure you want to do this?'
				) . '\', \'' . $this->getDeleteUrl() . '\')',
				'sort_order' => 20,
			];
		}
		return $data;
	}

	/**
	 * Get URL for delete button
	 *
	 * @return string
	 */
	public function getDeleteUrl() {
		return $this->getUrl('*/*/delete', ['request_id' => $this->getModelId()]);
	}
}