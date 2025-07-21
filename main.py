import os
import numpy as np
import tensorflow as tf
from flask import Flask, request, jsonify, render_template
from werkzeug.utils import secure_filename
from PIL import Image
from tensorflow.keras.applications.resnet import preprocess_input
from flask_cors import CORS

# Constants
IMG_SIZE = (224, 224)
UPLOAD_FOLDER = 'uploads'
ALLOWED_EXTENSIONS = {'png', 'jpg', 'jpeg'}
CLASS_NAMES = ['0.5mm', '1mm', '2mm', 'no_err']  # Update as per your model

# Ensure upload folder exists
os.makedirs(UPLOAD_FOLDER, exist_ok=True)

# Load model
model_path = os.path.abspath("err_resnet_tf.keras")
if not os.path.exists(model_path):
    raise FileNotFoundError(f"Model file not found at: {model_path}")
print(f"Loading model from: {model_path}")
model = tf.keras.models.load_model(model_path)

# Initialize Flask app
app = Flask(__name__)
app.config['UPLOAD_FOLDER'] = UPLOAD_FOLDER
CORS(app) 
# Allowed file check
def allowed_file(filename):
    return '.' in filename and filename.rsplit('.', 1)[1].lower() in ALLOWED_EXTENSIONS

# Prediction Method 1
def predict_on_image(model, image_path, image_size=(224, 224), class_names=None):
    try:
        img = tf.keras.utils.load_img(image_path, target_size=image_size)
        img_array = tf.keras.utils.img_to_array(img)
        img_array = tf.expand_dims(img_array, 0)

        predictions = model.predict(img_array)
        score = tf.nn.softmax(predictions[0])

        if class_names:
            predicted_class = class_names[np.argmax(score)]
            confidence = 100 * np.max(score)
            return predicted_class, float(confidence)
        else:
            return predictions.tolist(), 0.0
    except Exception as e:
        return f"Error in predict_on_image: {str(e)}", 0.0

# Prediction Method 2
def predict_image_tf(img_path, model, target_size=IMG_SIZE):
    try:
        img = Image.open(img_path).convert('RGB').resize(target_size)
        arr = np.array(img)[None, ...]
        arr = preprocess_input(arr)

        preds = model.predict(arr)
        idx = np.argmax(preds, axis=1)[0]
        return CLASS_NAMES[idx], float(preds[0, idx])
    except Exception as e:
        return f"Error in predict_image_tf: {str(e)}", 0.0

# Serve HTML form
@app.route('/form')
def form():
    return render_template('predi.html')

# Home route
@app.route('/')
def index():
    return "Image Classification API is up!"

# Prediction API
@app.route('/predict', methods=['POST'])
def predict():
    if 'image' not in request.files:
        return jsonify({'error': 'No image part in the request'}), 400

    file = request.files['image']
    if file.filename == '':
        return jsonify({'error': 'No selected image'}), 400

    if file and allowed_file(file.filename):
        filename = secure_filename(file.filename)
        file_path = os.path.join(app.config['UPLOAD_FOLDER'], filename)
        file.save(file_path)

        # Run both prediction methods
        predicted_class1, confidence1 = predict_on_image(model, file_path, class_names=CLASS_NAMES)
        predicted_class2, confidence2 = predict_image_tf(file_path, model)

        os.remove(file_path)  # Cleanup

        return jsonify({
            'method_2': {
                'predicted_class': predicted_class2,
                'confidence': f"{confidence2:.2f}%"
            }
        })

    return jsonify({'error': 'File type not allowed'}), 400

# Run the app
if __name__ == '__main__':
    app.run(debug=True, port=1000)
