from flask import Flask, render_template, request, jsonify
import json
import pandas as pd
import sys

app=Flask(__name__)
app.config['JSONIFY_PRETTYPRINT_REGULAR'] = False
app.config['DEBUG'] = True

@app.route('/api',methods=['POST'])

def index():
    record = json.loads(request.data)
    print(record)
    df = pd.DataFrame(record)
    X = df[df.user_id > 0]
    Y = df[df.user_id.isnull()]
    X1 = X.pivot(index = 'user_id', columns ='question_id') #index ='user_id',
    Y1 = Y.pivot(index = 'user_id', columns = 'question_id')
    datak = []
    k = []
    y = X1.index
    for a in range(len(y)):
        datak.append(y[a])
    Z1 = pd.DataFrame({'Label':datak})

    from sklearn.neighbors import KNeighborsRegressor
    KNN_model = KNeighborsRegressor(n_neighbors=1).fit(X1,Z1)
    KNN_predict = KNN_model.predict(Y1)
    z = str(KNN_predict[0][0])
    k.extend(z)
    res = int(k[0])
    return json.dumps(res)
app.run()