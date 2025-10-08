export class Cart {
    items: { productId: number; quantity: number }[];

    constructor() {
        this.items = [];
    }

    addItem(productId: number, quantity: number): void {
        const existingItem = this.items.find(item => item.productId === productId);
        if (existingItem) {
            existingItem.quantity += quantity;
        } else {
            this.items.push({ productId, quantity });
        }
    }

    removeItem(productId: number): void {
        this.items = this.items.filter(item => item.productId !== productId);
    }

    calculateTotal(products: { id: number; price: number }[]): number {
        return this.items.reduce((total, item) => {
            const product = products.find(p => p.id === item.productId);
            return total + (product ? product.price * item.quantity : 0);
        }, 0);
    }

    clearCart(): void {
        this.items = [];
    }
}