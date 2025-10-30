CC       ?= clang
CFLAGS   := -std=c11 -O2 -w
AR       ?= ar
ARFLAGS  ?= rcs
LDFLAGS  :=

# santitizer support 
# useful when developing or debugging
# enable sanitizers easily: `make SAN=1`
ifeq ($(SAN),1)
 CFLAGS  += -fsanitize=address,undefined -g
 LDFLAGS += -fsanitize=address,undefined
endif

LIB       = libmini_proto.a
DEMO      = demo.bin

# build targets
all: $(LIB) $(DEMO)

$(LIB): mini_proto.o
	$(AR) $(ARFLAGS) $@ $^

mini_proto.o: mini_proto.c mini_proto.h
	$(CC) $(CFLAGS) -c $< -o $@

demo.o: demo.c mini_proto.h
	$(CC) $(CFLAGS) -c $< -o $@

$(DEMO): demo.o $(LIB)
	$(CC) $(CFLAGS) $^ -o $@ $(LDFLAGS)

# clean up build artifacts
clean:
	rm -f $(DEMO) $(LIB) mini_proto.o demo.o

.PHONY: all clean
