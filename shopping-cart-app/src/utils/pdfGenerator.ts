import { PDFDocument, rgb } from 'pdf-lib';

export async function generatePDF(invoiceData) {
    const { items, total, user } = invoiceData;

    const pdfDoc = await PDFDocument.create();
    const page = pdfDoc.addPage([600, 400]);

    const title = 'Invoice';
    const titleFontSize = 24;
    const textFontSize = 12;

    page.drawText(title, {
        x: 50,
        y: 350,
        size: titleFontSize,
        color: rgb(0, 0, 0),
    });

    let yPosition = 320;

    items.forEach(item => {
        page.drawText(`Product: ${item.name}`, { x: 50, y: yPosition, size: textFontSize });
        page.drawText(`Quantity: ${item.quantity}`, { x: 200, y: yPosition, size: textFontSize });
        page.drawText(`Price: Q${item.price.toFixed(2)}`, { x: 300, y: yPosition, size: textFontSize });
        yPosition -= 20;
    });

    page.drawText(`Total: Q${total.toFixed(2)}`, {
        x: 50,
        y: yPosition - 20,
        size: textFontSize,
        color: rgb(0, 0, 0),
    });

    page.drawText(`User: ${user.name}`, {
        x: 50,
        y: yPosition - 40,
        size: textFontSize,
        color: rgb(0, 0, 0),
    });

    const pdfBytes = await pdfDoc.save();
    return pdfBytes;
}