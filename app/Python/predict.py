import sys
import numpy as np
import tensorflow as tf
from sklearn.preprocessing import StandardScaler
import joblib

# Load the trained model
model = tf.keras.models.load_model("flood_model.keras")

# Load the pre-fitted scaler
scaler = joblib.load("scaler.pkl")

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
