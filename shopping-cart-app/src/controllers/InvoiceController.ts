export class InvoiceController {
    constructor(private cart: Cart, private user: any) {}

    generateInvoice() {
        const invoiceData = this.createInvoiceData();
        const pdfPath = this.createPDF(invoiceData);
        return pdfPath;
    }

    private createInvoiceData() {
        const items = this.cart.getItems();
        const totalAmount = this.cart.calculateTotal();
        return {
            user: this.user,
            items: items,
            total: totalAmount,
            date: new Date().toLocaleDateString(),
        };
    }

    private createPDF(invoiceData: any) {
        const pdfGenerator = require('../utils/pdfGenerator');
        return pdfGenerator.generatePDF(invoiceData);
    }
}