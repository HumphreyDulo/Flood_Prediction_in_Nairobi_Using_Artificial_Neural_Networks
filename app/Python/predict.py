import sys
import numpy as np
import tensorflow as tf
from sklearn.preprocessing import StandardScaler
import joblib

# Absolute paths to the model and scaler
model_path = r"C:\Users\User\Flood_Prediction_in_Nairobi_Using_Artificial_Neural_Networks\app\Python\flood_model.keras"
scaler_path = r"C:\Users\User\Flood_Prediction_in_Nairobi_Using_Artificial_Neural_Networks\app\Python\scaler.pkl"

# Load the trained model
model = tf.keras.models.load_model(model_path)

# Load the pre-fitted scaler
scaler = joblib.load(scaler_path)

# Get the features passed as arguments from the command line
features = list(map(float, sys.argv[1].split(',')))

# Convert features to a NumPy array and reshape
features = np.array(features).reshape(1, -1)

# Scale features using the loaded scaler
scaled_features = scaler.transform(features)

# Make a prediction
prediction = model.predict(scaled_features)[0][0]

# Output the prediction
print(f"Predicted Flood Probability: {prediction:.4f}")
