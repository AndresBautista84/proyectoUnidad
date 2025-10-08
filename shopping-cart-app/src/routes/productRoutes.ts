import { Router } from 'express';
import ProductController from '../controllers/ProductController';

const setProductRoutes = (app: Router) => {
  const productController = new ProductController();

  app.get('/products', productController.getAllProducts.bind(productController));
  app.get('/products/:id', productController.getProductById.bind(productController));
};

export default setProductRoutes;