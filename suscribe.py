import paho.mqtt.client as mqtt

def on_message(client, userdata, msg):
    print(msg.topic + " " + str(msg.qos) + " " + str(msg.payload))

mqttc = mqtt.Client()
mqttc.on_message = on_message
mqttc.connect("140.84.186.242", 1883, 60)
mqttc.subscribe("#", 0)

mqttc.loop_forever()
