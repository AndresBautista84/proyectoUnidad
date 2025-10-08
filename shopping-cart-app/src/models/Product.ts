export class Product {
    id: number;
    name: string;
    price: number;
    stock: number;

    constructor(id: number, name: string, price: number, stock: number) {
        this.id = id;
        this.name = name;
        this.price = price;
        this.stock = stock;
    }

    isAvailable(quantity: number): boolean {
        return this.stock >= quantity;
    }

    reduceStock(quantity: number): void {
        if (this.isAvailable(quantity)) {
            this.stock -= quantity;
        } else {
            throw new Error("Insufficient stock available.");
        }
    }

    increaseStock(quantity: number): void {
        this.stock += quantity;
    }
}