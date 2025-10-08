import { Router } from 'express';
import CartController from '../controllers/CartController';

const cartRoutes = Router();
const cartController = new CartController();

cartRoutes.post('/add', cartController.addItem.bind(cartController));
cartRoutes.post('/remove', cartController.removeItem.bind(cartController));
cartRoutes.post('/checkout', cartController.checkout.bind(cartController));

export default function setCartRoutes(app) {
  app.use('/cart', cartRoutes);
}