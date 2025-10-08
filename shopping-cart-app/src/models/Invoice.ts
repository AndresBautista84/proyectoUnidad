export class Invoice {
    items: { name: string; quantity: number; price: number }[];
    totalAmount: number;
    userId: string;
    date: Date;

    constructor(userId: string) {
        this.items = [];
        this.totalAmount = 0;
        this.userId = userId;
        this.date = new Date();
    }

    addItem(name: string, quantity: number, price: number) {
        this.items.push({ name, quantity, price });
        this.totalAmount += quantity * price;
    }

    generateInvoiceDetails() {
        return {
            userId: this.userId,
            items: this.items,
            totalAmount: this.totalAmount,
            date: this.date,
        };
    }
}