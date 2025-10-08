import { Router } from 'express';
import InvoiceController from '../controllers/InvoiceController';

const setInvoiceRoutes = (app: Router) => {
  const invoiceController = new InvoiceController();

  app.post('/invoice/generate', invoiceController.generateInvoice);
};

export default setInvoiceRoutes;