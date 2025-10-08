export class CartController {
    private cart: Cart;

    constructor() {
        this.cart = new Cart();
    }

    public addItem(req: any, res: any) {
        const { productId, quantity } = req.body;
        const result = this.cart.addItem(productId, quantity);
        if (result.success) {
            res.status(200).json({ message: 'Item added to cart', cart: this.cart });
        } else {
            res.status(400).json({ message: result.message });
        }
    }

    public removeItem(req: any, res: any) {
        const { productId } = req.body;
        const result = this.cart.removeItem(productId);
        if (result.success) {
            res.status(200).json({ message: 'Item removed from cart', cart: this.cart });
        } else {
            res.status(400).json({ message: result.message });
        }
    }

    public checkout(req: any, res: any) {
        const userId = req.body.userId;
        const invoiceData = this.cart.checkout(userId);
        if (invoiceData) {
            const invoiceController = new InvoiceController();
            invoiceController.generateInvoice(invoiceData);
            res.status(200).json({ message: 'Checkout successful', invoice: invoiceData });
        } else {
            res.status(400).json({ message: 'Checkout failed, cart is empty' });
        }
    }
}