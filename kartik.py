import pandas as pd
import numpy as np
from sklearn import preprocessing
from sklearn.linear_model import LogisticRegression
from sklearn.model_selection import cross_val_score
from keras.models import Sequential
from keras.layers import Activation
from keras.optimizers import SGD
from keras.layers import Dense


df = pd.read_csv("kartik.csv")

le = preprocessing.LabelEncoder()
l1 = df["Soil"]
le.fit(l1)
newsoil = le.transform(l1)
df["Soil"]=newsoil
columns=["Rice","Wheat","Cotton","Sugarcane","Tea",	"Coffee","Cashew","Rubber","Coconut","Oilseed","Ragi","Maize","Groundnut","Millet","Barley"]
l2 = df["Month"]
le.fit(l2)
df["Month"]=le.transform(l2)

l3 = df["State"]
le.fit(l3)
df["State"]=le.transform(l3)

#df=df.iloc[:,1:]
df = pd.DataFrame(data = df.iloc[:,:].values, columns=["Soil","Month","State","Rice","Wheat","Cotton","Sugarcane","Tea","Coffee","Cashew","Rubber","Coconut","Oilseed","Ragi","Maize","Groundnut","Millet","Barley"])

#print(df)
feat = pd.DataFrame({"Soil": df["Soil"], "Month" : df["Month"], "State": df["State"]})
labels = pd.DataFrame(data=df.iloc[:,3:],columns=["Rice","Wheat","Cotton","Sugarcane","Tea",	"Coffee","Cashew","Rubber","Coconut","Oilseed","Ragi","Maize","Groundnut","Millet","Barley"])
#print(df)
from keras.utils import np_utils
from sklearn.model_selection import train_test_split

(trainData, testData, trainLabels, testLabels) = train_test_split(feat, labels, test_size=0.025, random_state=42)
#print(trainData.values)
model = Sequential()
model.add(Dense(15, input_dim=3, init="uniform",activation="softmax"))
"""
model.add(Dense(10, input_dim=3, init="uniform",activation="relu"))
print(model.output)
model.add(Dense(15, init="uniform", activation="relu"))
print(model.output)
model.add(Activation("sigmoid"))
print(model.output)
print(model.summary())
"""
#trainLabels = trainLabels.reshape((-1, 1))
print(trainData.shape, testData.shape, trainLabels.shape, testLabels.shape)

sgd = SGD(lr=0.01)
model.compile(loss="binary_crossentropy", optimizer="adam", metrics=["accuracy"])
model.fit(trainData.values, trainLabels.values, epochs=500, batch_size=10, verbose=0)

(loss, accuracy) = model.evaluate(testData.values, testLabels.values,	batch_size=40, verbose=0)

#print("[INFO] loss={:.4f}, accuracy: {:.4f}%".format(loss,accuracy * 100))

pred = model.predict_proba(testData.values)
for row in range(len(pred)):
    max_val = pred[row][0]
    max_ind = 0
    for col in range(1,len(pred[row])):
        if(max_val < pred[row][col]):
            max_val = pred[row][col]
            max_ind = col
    print(columns[max_ind])
    
df = pd.DataFrame(pred, columns=["Rice","Wheat","Cotton","Sugarcane","Tea",	"Coffee","Cashew","Rubber","Coconut","Oilseed","Ragi","Maize","Groundnut","Millet","Barley"])
#print(df)