import os
import json
import operator

def load_json_data(directory_s):
	try:
		file = open(directory_s, 'r')
		raw_json = file.read()
		json_data = json.loads(raw_json)
		return json_data
	except IOError:
		return None
	else:
		print "new error"
		return None

json_dir = "/json/"

json_files = os.listdir(json_dir)
datas = []
for f in json_files:
	datas.append(load_json_data(json_dir + f))

diff = {}

for x in xrange(len(datas)):
	for y in xrange(x+1, len(datas)):
		arr1 = datas[x]["all_nodes"]
		arr2 = datas[y]["all_nodes"]
		diff_elem = 0
		for elem in arr1:
			if not elem in arr2:
				diff_elem = diff_elem + 1

		for elem in arr2:
			if not elem in arr1:
				diff_elem = diff_elem + 1

		kkkey = str(datas[x]["_id"]) + "_" + str(datas[y]["_id"])
		diff[kkkey] = float(diff_elem) / float((len(arr1)) + float(len(arr2)))

sorted_diff = sorted(diff.items(), key=operator.itemgetter(1))
print sorted_diff

# stru1 = load_json_data(json1)
# stru2 = load_json_data(json2)

# arr1 = stru1["all_nodes"]
# arr2 = stru2["all_nodes"]



# print float(diff_elem) / float((len(arr1)) + float(len(arr2)))

# input_directory = "/Users/kedanli/Desktop/fullbfs/"

# sub_directories = os.listdir(input_directory)

# #check all the images   for similar images, only 1 copy will be kept    all others deleted
# def clean_app(sub_directories):
# 	json_dir = sub_directories + '/json/'
# 	image_dir = sub_directories + '/images/'
# 	image_files = os.listdir(image_dir)
# 	images_data = {}
# 	for file_name in image_files:
# 		image_file_dir = image_dir + file_name
# 		print image_file_dir
# 		img = Image.open(image_file_dir).convert('L')
# 		images_data[file_name] = img

# 	to_remove = set()
# 	runCount = 0
# 	for key in images_data.keys():
# 		runCount = runCount +1 
# 		if not key in to_remove:
# 			print key
# 			print runCount
# 			for check_key in images_data.keys():
# 				if key != check_key and not check_key in to_remove:
# 					h1 = images_data[key].histogram()
# 					h2 = images_data[check_key].histogram()
# 					rms = math.sqrt(reduce(operator.add,  list(map(lambda a,b: (a-b)**2, h1, h2)))/len(h1) )
# 					if rms < 10000:
# 						to_remove.add(check_key)

# 	for remove_k in to_remove:
# 		os.remove(image_dir+remove_k)
# 		json_name = remove_k[:-4]+".json"
# 		os.remove(json_dir+json_name)
# 		del images_data[remove_k]

# for sub in sub_directories:
# 	if sub != '.DS_Store':
# 		directory = input_directory + sub
# 		clean_app(directory)