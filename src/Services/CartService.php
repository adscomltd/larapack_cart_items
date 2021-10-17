<?php

namespace Adscom\LarapackCartItems\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

abstract class CartService
{
  abstract public function getItems(): array;

  abstract public function setItems(array $items): void;

  abstract public function getProductValidationRules(): mixed;

  public function validateProductItem(Request $request, bool $isBatch = false): void
  {
    $rules = $this->getProductValidationRules();

    if ($isBatch) {
      $rules = [
        'data.id' => $rules,
      ];
    } else {
      $rules = [
        'id' => $rules,
      ];
    }

    $request->validate($rules);
  }

  public function getCartItems(): Collection
  {
    return collect($this->getItems())->mapWithKeys(fn($item) => [$item['id'] => $item]);
  }

  public function setCartItems(Collection $items): void
  {
    $this->setItems($items->values()->toArray());
  }

  public function addCartItem(array $cartItem): void
  {
    $items = $this->getCartItems();
    ['id' => $id, 'qty' => $qty] = $cartItem;

    $result = $items->get($id);

    $items->put($id, [
      'id' => $id,
      'qty' => ($result['qty'] ?? 0) + $qty
    ]);

    $this->setCartItems($items);
  }

  public function addCartItems(array $data): void
  {
    foreach ($data as $item) {
      $this->addCartItem($item);
    }
  }

  public function setCartItemQuantity(array $cartItem): void
  {
    $items = $this->getCartItems();
    ['id' => $id, 'qty' => $qty] = $cartItem;

    if (!$items->has($id)) {
      return;
    }

    $items->put($id, [
      'id' => $id,
      'qty' => $qty
    ]);

    $this->setCartItems($items);
  }

  public function removeCartItem(int $id): void
  {
    $items = $this->getCartItems();
    $items->forget($id);

    $this->setCartItems($items);
  }

  public function removeAllCartItems(): void
  {
    $this->setCartItems(collect());
  }
}
