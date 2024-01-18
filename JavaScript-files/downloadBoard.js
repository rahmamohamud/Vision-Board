function downloadImage() {
    // Get the container element
    const container = document.querySelector('.container');
  
    // Set the scale for higher resolution (adjust as needed)
    const scale = 2;
  
    // Use html2canvas to convert the content to an image
    html2canvas(container, { scale: scale, quality: 1.0 }).then(canvas => {
      // Convert the canvas to a blob
      canvas.toBlob(blob => {
        // Create a download link
        const a = document.createElement('a');
        a.href = URL.createObjectURL(blob);
        a.download = 'downloaded_image.png';
  
        // Append the link to the body and trigger a click event
        document.body.appendChild(a);
        a.click();
  
        // Remove the link from the body
        document.body.removeChild(a);
      }, 'image/png');
    });
  }