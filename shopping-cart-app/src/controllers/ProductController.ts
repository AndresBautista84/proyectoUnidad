export class ProductController {
    private products: Array<{ id: number; name: string; price: number; stock: number }> = [];

    constructor() {
        this.products = [
            { id: 1, name: "Producto 1", price: 100, stock: 10 },
            { id: 2, name: "Producto 2", price: 150, stock: 5 },
            { id: 3, name: "Producto 3", price: 200, stock: 0 },
            // Add more products as needed
        ];
    }

    public getAllProducts(req: any, res: any) {
        res.json(this.products);
    }

    public getProductById(req: any, res: any) {
        const productId = parseInt(req.params.id);
        const product = this.products.find(p => p.id === productId);
        if (product) {
            res.json(product);
        } else {
            res.status(404).json({ message: "Producto no encontrado" });
        }
    }
}