export interface Product {
  id: number;
  name: string;
  price: number;
  stock: number;
}

export interface CartItem {
  product: Product;
  quantity: number;
}

export interface InvoiceData {
  items: CartItem[];
  totalAmount: number;
  userId: number;
  date: Date;
}