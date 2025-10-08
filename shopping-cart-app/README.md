# Shopping Cart App

## Overview
The Shopping Cart App is a web application that allows users to browse products, add them to a shopping cart, and proceed to checkout. The application generates a PDF invoice for the purchased items, providing a seamless shopping experience.

## Project Structure
```
shopping-cart-app
├── src
│   ├── controllers          # Contains controllers for handling business logic
│   │   ├── CartController.ts
│   │   ├── ProductController.ts
│   │   └── InvoiceController.ts
│   ├── models               # Contains models representing the data structure
│   │   ├── Cart.ts
│   │   ├── Product.ts
│   │   └── Invoice.ts
│   ├── routes               # Contains route definitions for the application
│   │   ├── cartRoutes.ts
│   │   ├── productRoutes.ts
│   │   └── invoiceRoutes.ts
│   ├── views                # Contains HTML views for the application
│   │   ├── Carrito.html
│   │   └── mujeres.html
│   ├── utils                # Contains utility functions
│   │   └── pdfGenerator.ts
│   └── types                # Contains TypeScript type definitions
│       └── index.ts
├── package.json             # NPM package configuration
├── tsconfig.json            # TypeScript configuration
└── README.md                # Project documentation
```

## Features
- **Product Browsing**: Users can view a list of products available for purchase.
- **Shopping Cart**: Users can add products to their cart, view the cart, and remove items if needed.
- **Checkout Process**: Users can proceed to checkout, where an invoice is generated.
- **PDF Invoice Generation**: After checkout, a PDF invoice is created with the purchase details.

## Setup Instructions
1. **Clone the Repository**:
   ```bash
   git clone <repository-url>
   cd shopping-cart-app
   ```

2. **Install Dependencies**:
   ```bash
   npm install
   ```

3. **Run the Application**:
   ```bash
   npm start
   ```

4. **Access the Application**:
   Open your web browser and navigate to `http://localhost:3000` (or the port specified in your configuration).

## Usage
- Navigate to the **mujeres.html** view to browse products.
- Add items to your cart and view them in the **Carrito.html** view.
- Proceed to checkout to generate your invoice.

## Contributing
Contributions are welcome! Please submit a pull request or open an issue for any enhancements or bug fixes.

## License
This project is licensed under the MIT License. See the LICENSE file for details.