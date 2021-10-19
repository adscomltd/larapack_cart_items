<?php

namespace Adscom\LarapackCartItems\Http\Controllers;

use Adscom\LarapackCartItems\Http\Requests\CartItemBatchStoreRequest;
use Adscom\LarapackCartItems\Http\Requests\CartItemStoreRequest;
use Adscom\LarapackCartItems\Http\Requests\CartItemUpdateRequest;
use Adscom\LarapackCartItems\Services\CartService;

class CartItemController extends Controller
{
  public function index(CartService $service): array
  {
    return $service->getItems();
  }

  public function store(CartItemStoreRequest $request, CartService $service): void
  {
    $service->validateProductItem($request);
    $validated = $request->validated();
    $service->addCartItem($validated);
  }

  public function update(int $id, CartItemUpdateRequest $request, CartService $service): void
  {
    $service->setCartItemQuantity([
      'id' => $id,
      'qty' => $request->qty,
    ]);
  }

  public function destroy(int $id, CartService $service): void
  {
    $service->removeCartItem($id);
  }

  public function batchDestroy(CartService $service): void
  {
    $service->removeAllCartItems();
  }

  public function batchStore(CartItemBatchStoreRequest $request, CartService $service): void
  {
    $service->validateProductItem($request, true);
    $validated = $request->validated();
    $service->addCartItems($validated['data']);
  }
}
